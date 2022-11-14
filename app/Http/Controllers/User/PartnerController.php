<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'phone' => ['nullable', 'digits_between:11,14'],
            'address' => ['required', 'string', 'max:1000'],
            'description' => ['nullable', 'string', 'max:1000'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\Partner,email'],
            'website' => ['nullable', 'string', 'url', 'max:255'],
        ]);

        DB::transaction(function () use ($request) {
            $partner = Partner::where('user_id', auth()->user()->id)->first();

            if ($request->hasfile('logo')) {
                if (!empty($partner->logo)) {
                    File::delete(public_path('assets/mitra/logo/' . $partner->logo));
                }

                $img = Image::make($request->file('logo'));

                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $photoName = auth()->user()->id . '_' . time() . '.' . $request->file('logo')->extension();
                $img->save(public_path('assets/mitra/logo/' . $photoName));
                $img->destroy();
            } else {
                $logoName = $partner->logo;
            }

            if ($request->name != auth()->user()->name) {
                User::where('id', auth()->user()->id)->update([
                    'name' => $request->name,
                ]);
            }

            Partner::where('user_id', auth()->user()->id)->update([
                'logo' => $logoName,
                'email' => $request->email,
                'phone' => str_replace(' ', '', $request->phone),
                'address' => $request->address,
                'description' => $request->description,
                'emailKantor' => $request->emailKantor,
                'website' => $request->website,
            ]);
        });

        return redirect()->route('member.daftar.mitra.agreement.index');
    }

    public function agreementIndex()
    {
        $partner = Partner::where('user_id', auth()->user()->id)->first();

        $notComplete = false;
        if (empty($partner->logo) || empty($partner->phone) || empty($partner->address) || empty($partner->description)) {
            $notComplete = true;
            Alert::error('Silahkan isi yang diperlukan');
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

        if (empty($partner->submitted_at)) {
            $request->validate([
                'agreementTos' => ['required', 'accepted'],
            ]);

            Partner::where('user_id', auth()->user()->id)->update([
                'tos' => true,
                'submitted_at' => date('Y-m-d H:i:s', time()),
            ]);
        } else {
            Alert('warning', 'You had submitted partner form, please wait until approved by Admin');
        }

        if (empty($partner->logo) || empty($partner->phone) || empty($partner->address) || empty($partner->description)) {
            Alert::error('Silahkan isi yang diperlukan');
            return redirect()->route('member.daftar.mitra.agreement.index');
        }
    }
}
