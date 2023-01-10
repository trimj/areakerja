<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardFinanceController extends Controller
{
    public function index()
    {
        $riwayat = Invoice::all();
        $saldo['jumlah'] = 0;
        $saldo['mean'] = 0;
        if (count($riwayat) > 0) {
            $saldo['jumlah'] = $riwayat->sum('amount');
            $saldo['mean'] = $saldo['jumlah']/$riwayat->count();
        }
        $data = Invoice::whereYear('created_at', now()->year -1)->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });
        foreach ($data as $key => $value) {
            $amountTemp[$key] = $value->sum('amount');
        }
        $amount['amount']['months'] = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        foreach ($amount['amount']['months'] as $key => $value) {
            if (!isset($amountTemp[$value])) {
                $amount['amount']['values'][] = 0;
            } else {
                $amount['amount']['values'][] = $amountTemp[$value];
            }
        }
        $amount['max']=max($amount['amount']['values']);
        return view('finance.dashboard', compact(['riwayat', 'saldo', 'amount']));
    }

    public function show($id)
    {
        $riwayat = Financial::find($id);
        return view('finance.dashboard', compact(
            ['riwayat']
        ));
    }

    public function ajaxPagination(Request $request)
    {
        $items = FinanceActivity::paginate(1);
        if ($request->ajax()) {
            return view('data', compact('items'));
        }
        return view('items',compact('items'));
    }
}
