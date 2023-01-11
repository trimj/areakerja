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
            $saldo['jumlah'] = $riwayat->sum('price');
            $saldo['mean'] = $saldo['jumlah'] / $riwayat->count();
        }
        $data = [];
        $month = now()->month;
        $year = now()->year;
        for ($i=0; $i <= 11 ; $i++) {
            if ($month == 0) {
                $month = 12;
                $year--;
            }
            array_push($data, 
                Invoice::whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->get()
                ->groupBy(function ($data) {
                    return Carbon::parse($data->created_at)->format('M');
                })
            );
            $month--;
        }
        $amount = [];
        foreach ($data as $monthKey => $monthData) {
            if (count($monthData)==0) {
                $amount['amount']['values'][] = 0;
                $amount['amount']['months'][] = date("M", mktime(0, 0, 0, now()->month-$monthKey, 1));
            } else {
                foreach ($monthData as $key => $value) {
                    $amount['amount']['values'][] = $value[0]->price;
                    $amount['amount']['months'][] = $key;
                }
            }
        }
        $amount['max'] = max($amount['amount']['values']);
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
        return view('items', compact('items'));
    }
}
