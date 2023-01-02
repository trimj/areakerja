<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;
use App\Mail\EditHarga;
use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class EditHargaController extends Controller
{
    public function index()
    {
        if (Cookie::get('edit-harga') == null) {
            $email = Email::whereDate('created_at', Carbon::today())->where('user_id', '=', Auth::id())->first();
            $sent = true;
            if (!isset($email)) {
                $code = random_int(100000, 999999);
                Email::create([
                    'code' => $code,
                    'user_id' => Auth::id(),
                    'type' => 'edit-harga',
                    'sent_at' => Carbon::now()->timestamp,
                ]);
            } else {
                $sent_at = new Carbon($email->sent_at);
                if ($sent_at->addMinutes(5)->timestamp <= Carbon::now()->timestamp) {
                    $email->sent_at = Carbon::now()->toDateTimeString();
                    $code = $email->code;
                    $email->save();
                } else {
                    $sent = false;
                }
            }
            if ($sent) {
                Mail::to('super-admin@mail.com')->send(new EditHarga($code));
            }
            return view('finance.verifikasi', compact('sent'));
        } else {
            $harga = Price::all();
            $product = Product::all();
            $no = 1;
            return view('finance.edit-harga', compact('harga', 'product','no'));
         }
    }

    public function store(Request $request)
    {
        $inputCode = implode("", $request->request->all()['code']);
        $dbCode = Email::where('code', '=', $inputCode)->where('user_id', '=', Auth::id())->first();
        Email::where('user_id', '=', Auth::id())->delete();
        if (isset($dbCode)) {
            Cookie::queue('edit-harga', $inputCode, 1080);
        }
        return redirect(route('finance.edit-harga.index'));
    }

    public function update(Request $request, $id)
    {
        $harga = Price::find($id);
        // dd($harga);
        $harga->id = $request->id;
        $harga->price = $request->price;
        $harga->save();

        return redirect(route('finance.edit-harga.index'));
    }
  
    public function simpanharga(Request $request){
        foreach ($request->request->all()['id'] as $key => $value) {
            $simpan[$key] = Product::find($value);
            if (isset($request->request->all()['tombol'][$key])) {
                
                $simpan[$key]->update(['price'=>$request->request->all()['price'][$key],'promo'=>$request->request->all()['promo'][$key],'promo_status'=>$request->request->all()['tombol'][$key],'total'=>$request->request->all()['total'][$key]]);
            }else {
                $simpan[$key]->update(['price'=>$request->request->all()['price'][$key],'promo'=>$request->request->all()['promo'][$key],'promo_status'=>$request->request->all()['tombol'][$key],'total'=>$request->request->all()['total'][$key]]);
                
            }
        }
        return redirect(route('finance.edit-harga.index'));
    }
}
