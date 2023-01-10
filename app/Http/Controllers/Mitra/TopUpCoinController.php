<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TopUpCoinController extends Controller
{
    private $page_title = 'Top Up Coins - Mitra CP';

    public function __construct()
    {
        $this->middleware('permission:top-up-coin');

        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index()
    {
        return view('mitra.topup.index', [
            'page_title' => $this->page_title,
            'coin' => Price::where('type', 'coin')->first(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'coin' => ['required', 'numeric', 'min:5', 'max:10000'],
        ]);

        $invoice_unique = uniqid();
        $user = auth()->user();
        $coin_price = Price::where('type', 'coin')->first();

        $invoice = Invoice::create([
            'coin_log_id' => $request->donor_mail,
            'partner_id' => $user->partner->id,
            'invoice' => $invoice_unique,
            'amount' => intval($request->coin),
        ]);

        $payload = [
            'transaction_details' => [
                'order_id' => $invoice->invoice,
                'gross_amount' => $invoice->amount, // no decimal allowed for creditcard
            ],

            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],

            'item_details' => [
                [
                    'id' => 'Top Up Coin',
                    'price' => $coin_price * $invoice->amount,
                    'quantity' => 1,
                    'name' => 'Top Up ' . $invoice->amount . ' Coin(s)',
                ],
            ],
        ];

        $invoice->save();

        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($payload)->redirect_url;
            return redirect()->away($paymentUrl);
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->route('mitra.topup.index');
        }
    }

    public function notification()
    {
        $notification = new \Midtrans\Notification();

        DB::transaction(function () use ($notification) {
            $transactionStatus = $notification->transaction_status;
            $paymentType = $notification->payment_type;
            $orderId = $notification->order_id;
            $fraudStatus = $notification->fraud_status;

            $invoice = Invoice::where('')->first();
        });

        return;
    }

    public function transactionFinish()
    {
        Alert::success('Success', 'Thanks for purchasing our produnct!');
        return redirect()->route('mitra.topup.index');
    }

    public function transactionError()
    {
        Alert::error('Error', 'Something error!');
        return redirect()->route('mitra.topup.index');
    }
}
