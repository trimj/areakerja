<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoinLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CoinLogController extends Controller
{
    private $page_title = 'Coin Logs - Admin CP';

    public function __construct()
    {
        $this->middleware('can:manage-coin-log')->only('index');
        $this->middleware('can:view-coin-log')->only('show');
        $this->middleware('can:delete-coin-log')->only('destroy');
        $this->middleware('can:restore-coin-log')->only('restore');
        $this->middleware('can:forceDelete-coin-log')->only('restore');
    }

    public function index(Request $request)
    {
        $coinLogs = new CoinLog();

        if ($request->has('order')) {
            if ($request->order == 'asc') {
                $orderby = 'asc';
            } elseif ($request->order == 'desc') {
                $orderby = 'desc';
            } else {
                $orderby = 'desc';
            }
        } else {
            $orderby = 'desc';
        }

        if ($request->has('sort')) {
            if ($request->sort == 'mitra') {
                $sortby = 'mitra_id';
            } elseif ($request->sort == 'kandidat') {
                $sortby = 'candidat_id';
            } elseif ($request->sort == 'lowongan') {
                $sortby = 'job_id';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        if ($request->has('data') && is_int($request->data)) {
            if ($request->data > 0 && $request->data <= 100) {
                $data = $request->data;
            } else {
                $data = 20;
            }
        } else {
            $data = 20;
        }

        return view('admin.logs.coin.index', [
            'page_title' => 'Manage ' . $this->page_title,
            'coinLogs' => $coinLogs->orderBy($sortby, $orderby)->withTrashed()->paginate($data),
        ]);
    }

    public function show(CoinLog $coinLog)
    {
        //
    }

    public function destroy(CoinLog $coinLog)
    {
        if (!$coinLog->trashed()) {
            $coinLog::delete();
            Alert::toast('Successful', 'success');
        } else {
            Alert::toast('It\'s not trash yet', 'error');
        }

        return redirect()->route('admin.coinlog.index');
    }

    public function restore(CoinLog $coinLog)
    {
        if (!$coinLog->trashed()) {
            $coinLog->restore();
            Alert::toast('Successful', 'success');
        } else {
            Alert::toast('It has been removed', 'error');
        }

        return redirect()->route('admin.coinlog.index');
    }

    public function forceDestroy(CoinLog $coinLog)
    {
        if ($coinLog->trashed()) {
            $coinLog->forcedelete();
            Alert::toast('Successful', 'success');
        } else {
            Alert::toast('It\'s not trash yet', 'error');
        }

        return redirect()->route('admin.coinlog.index');
    }
}
