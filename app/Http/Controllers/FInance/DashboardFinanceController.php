<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardFinanceController extends Controller
{
    public function index()
    {
        $riwayat = Invoice::all();
        // $saldo = [];
        $saldo['jumlah'] = 0;
        $saldo['mean'] = 0;
        if (count($riwayat) > 0) {
            $saldo['jumlah'] = $riwayat->sum('amount');
            $saldo['mean'] = $saldo['jumlah']/$riwayat->count();
        }
        return view('finance.dashboard', compact(['riwayat', 'saldo']));
    }

    public function show($id)
    {
        $riwayat = Financial::find($id);
        return view('finance.dashboard', compact(
            ['riwayat']
        ));
    }

    public function ajaxGetLastYearInvoice(Request $request)
    {
        return response()->json(Invoice::all());
    }
}
