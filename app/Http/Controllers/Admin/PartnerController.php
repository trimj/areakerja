<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private $page_title = 'Partner - Admin CP';

    public function __construct()
    {
        $this->middleware('can:manage-partner')->only('index', 'show');
//        $this->middleware('can:create-partner')->only('create', 'store');
//        $this->middleware('can:edit-partner')->only('edit', 'update');
//        $this->middleware('can:delete-partner')->only('destroy');
    }

    public function index(Request $request)
    {
        $partners = new Partner();

        return view('admin.partner.index', [
            'page_title' => 'Manage ' . $this->page_title,
            'partners' => $partners->orderBy('created_at', 'asc')->paginate(20),
        ]);
    }

    public function show(Partner $partner)
    {
        return view('admin.partner.show', [
            'page_title' => $partner->user->name . $this->page_title,
            'partner' => $partner,
        ]);
    }
}
