<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinanceActivity;
use App\Models\Financial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardFinanceController extends Controller
{
    public function index()
    {
        $finance = FinanceActivity::paginate(3);
        // dd($finance);
        $riwayat = Financial::all();
        // dd($riwayat);
        return view('finance.dashboard', compact('finance','riwayat'));
    }

    public function show($id)
    {
        $riwayat = Financial::find($id);
        return view('finance.dashboard', compact(
            ['riwayat']
        ));
    }

    public function edit($id)
    {
        $riwayat = Financial::find($id);
        if ($riwayat) {
            return response()->json([
                'status'=>200,
                'riwayat'=>$riwayat
            ]);
        }
        else {
            return response()->json([
                'status'=>404,
                'message'=>'Not Found'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $riwayat = Financial::find($id);
        $riwayat->id = $request->id;
        $riwayat->billing_name = $request->billing_name;
        $riwayat->date = $request->date;
        $riwayat->total = $request->total;
        $riwayat->payment_status = $request->payment_status;
        $riwayat->payment_method = $request->payment_method;
        $riwayat->save();

        return redirect('finance');
    }

    public function destroy($id)
    {
        $riwayat = Financial::find($id);
        $riwayat->delete();
        return redirect('finance');
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
