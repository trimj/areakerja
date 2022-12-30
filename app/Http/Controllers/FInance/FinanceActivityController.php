<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinanceActivity;
use Illuminate\Http\Request;
use PDF;

class FinanceActivityController extends Controller
{
    public function index()
    {
        return view('finance/finance-activity');
    }

    public function cetak_pdf(){
        $finance = FinanceActivity::all();
        $pdf = PDF::loadview('finance/finance-activity-laporan',['finance'=>$finance]);
    	return $pdf->stream('laporan-finance-activity-pdf');
    }
}
