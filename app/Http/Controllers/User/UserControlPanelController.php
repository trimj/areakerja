<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;
use Alert;

class UserControlPanelController extends Controller
{
    protected $page_title = 'Control Panel';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('member.panel.dashboard', [
            'page_title' => $this->page_title,
        ]);
    }

    public function settings()
    {
        return view('member.panel.settings', [
            'page_title' => $this->page_title,
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        DB::transaction(function () use ($request) {
            $user = auth()->user();

            if ($request->hasfile('photo')) {
                if (!empty($user->photo)) {
                    File::delete(public_path('assets/public/photo/' . $user->photo));
                }

                $img = Image::make($request->file('photo'));

                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $photoName = $user->id . '_' . time() . '.' . $request->file('photo')->extension();
                $img->save(public_path('assets/public/photo/' . $photoName));
                $img->destroy();
            } else {
                $photoName = $user->photo;
            }

            User::where('id', $user->id)->update([
                'photo' => $photoName,
            ]);
        });

        Alert::toast('Successful', 'success');
        return redirect()->route('member.settings');
    }
}
