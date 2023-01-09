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
        return view('finance.dashboard', compact('riwayat'));
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
