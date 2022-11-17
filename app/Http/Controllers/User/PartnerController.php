<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\Partner;
use App\Models\Candidate;
use Image;
use Alert;

class PartnerController extends Controller
{
    protected $page_title = 'Daftar Mitra';

    private function steps(int $step, int $allSteps = 2)
    {
        $arr = [];
        for ($i = 1; $i <= $allSteps; $i++) {
            if ($i == $step) {
                $arr[$i] = 'active';
            } else if ($i < $step) {
                $arr[$i] = 'done';
            } else {
                $arr[$i] = null;
            }
        }
        return $arr;
    }

    public function __construct()
    {
//        $this->middleware('can:access-admincp');
//        $this->middleware('can:edit-user')->only('edit', 'update');
//        $this->middleware('can:edit-user-role')->only('updateRole');
    }

    public function index()
    {
        return view('member.partner.index', [
            'page_title' => $this->page_title,
        ]);
    }

    public function informationIndex()
    {
        $partner = Partner::where('user_id', auth()->user()->id)->first();

        if (empty($partner)) {
            Partner::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return view('member.partner.information', [
            'step' => $this->steps(1, 2),
            'page_title' => $this->page_title,
            'partner' => $partner,
        ]);
    }

    public function informationStore(Request $request)
    {
        $partner = Partner::where('user_id', auth()->user()->id)->first();

        if (empty($partner)) {
            Partner::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        $request->validate([
            'phone' => ['nullable', 'string', 'between:11,14'],
            'description' => ['nullable', 'string', 'max:1000'],
            'website' => ['nullable', 'string', 'url', 'max:255'],

            'address' => ['required', 'array', 'max:5'],

            'address.provinsi' => ['required', 'numeric'],
            'address.kota' => ['required', 'numeric'],
            'address.kecamatan' => ['required', 'numeric'],
            'address.kelurahan' => ['required', 'numeric'],
            'address.jalan' => ['required', 'string', 'max:500'],
        ]);

        if ($partner->email != $request->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\Partner,email'],
            ]);
        }

        if (empty($partner->submitted_at)) {
            Partner::where('user_id', auth()->user()->id)->update([
                'email' => $request->email,
                'phone' => str_replace(' ', '', $request->phone),
                'description' => $request->description,
                'website' => $request->website,
                'address' => !empty($request->address) ? array_filter($request->address) : null,
            ]);
        } else {
            Alert::toast('You had submitted partner form, please wait until approved by Admin', 'warning');
        }

        return redirect()->route('member.daftar.mitra.agreement.index');
    }

    public function agreementIndex()
    {
        $partner = Partner::where('user_id', auth()->user()->id)->first();

        if (empty($partner)) {
            Partner::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        $notComplete = false;
        if (empty($partner->user->photo) || empty($partner->phone) || empty($partner->email) || empty($partner->description) || empty($partner->address) || empty($partner->address['provinsi']) || empty($partner->address['kota']) || empty($partner->address['kecamatan']) || empty($partner->address['kelurahan']) || empty($partner->address['jalan'])) {
            $notComplete = true;
        }

        return view('member.partner.agreement', [
            'step' => $this->steps(2, 2),
            'page_title' => $this->page_title,
            'partner' => $partner,
            'notComplete' => $notComplete,
        ]);
    }

    public function agreementStore(Request $request)
    {
        $partner = Partner::where('user_id', auth()->user()->id)->first();

        if (empty($partner)) {
            Partner::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        if (empty($partner->user->photo) || empty($partner->phone) || empty($partner->email) || empty($partner->description) || empty($partner->address) || empty($partner->address['provinsi']) || empty($partner->address['kota']) || empty($partner->address['kecamatan']) || empty($partner->address['kelurahan']) || empty($partner->address['jalan'])) {
            Alert::error('Silahkan isi yang diperlukan');
        }

        $request->validate([
            'agreementTos' => ['required', 'accepted'],
        ]);

        if (empty($partner->submitted_at)) {
            $candidate = Candidate::where('user_id', auth()->user()->id)->first();
            if (!empty($candidate)) {
                $candidate->delete();
            }
            $partner->update([
                'tos' => true,
                'submitted_at' => date('Y-m-d H:i:s', time()),
            ]);
            auth()->user()->syncRoles(8); // Calon Mitra (Role)
        } else {
            Alert::toast('You had submitted partner form, please wait until approved by Admin', 'warning');
        }

        return redirect()->route('member.daftar.mitra.agreement.index');
    }
}
