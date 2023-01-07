<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PartnerController extends Controller
{
    private $page_title = 'Partner - Admin CP';

    public function __construct()
    {
        $this->middleware('can:manage-partner')->only('index', 'show');
//        $this->middleware('can:create-partner')->only('create', 'store');
        $this->middleware('can:edit-partner')->only('edit', 'update');
        $this->middleware('can:delete-partner')->only('destroy');
        $this->middleware('can:accept-pre-partner')->only('acceptPrePartner');
        $this->middleware('can:reject-pre-partner')->only('rejectPrePartner');
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

    public function acceptPrePartner(Partner $partner)
    {
        if (!empty($partner->submitted_at) && empty($partner->accepted_at)) {
            $partner->update([
                'approved_at' => date('Y-m-d h:i:s', time()),
                'rejected_at' => null,
            ]);

            // Role: Mitra
            $partner->user->syncRoles([4]);

            Alert::toast('Successful', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('admin.partner.index');
    }

    public function update(Request $request, Partner $partner)
    {
        //
    }

    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', [
            'page_title' => 'Edit ' . $partner->user->name . $this->page_title,
            'partner' => $partner,
        ]);
    }

    public function rejectPrePartner(Partner $partner)
    {
        if (!empty($partner->submitted_at) && empty($partner->rejected_at)) {
            $partner->update([
                'submitted_at' => null,
                'approved_at' => null,
                'rejected_at' => date('Y-m-d h:i:s', time()),
            ]);

            // Role: Calon Mitra
            $partner->user->syncRoles([8]);

            Alert::toast('Successful', 'success');
        } else {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('admin.partner.index');
    }

    public function destroy(Partner $partner)
    {
        // Role: Member
        $partner->user->syncRoles([6]);

        $partner->delete();

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.partner.index');
    }
}
