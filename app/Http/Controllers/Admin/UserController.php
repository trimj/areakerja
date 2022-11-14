<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use Alert;
use DB;
use Image;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    protected $page_title = 'Manage User';

    public function __construct()
    {
        $this->middleware('can:access-admincp');
        $this->middleware('can:edit-user')->only('edit', 'updatePhoto', 'updateInformation');
        $this->middleware('can:edit-user-role')->only('updateRole');
    }

    public function index()
    {
        return view('admin.user.index', [
            'page_title' => $this->page_title,
            'users' => User::all(),
        ]);
    }

    public function edit(User $user)
    {
        if ($user->getRoleNames()->first() == 'Super Admin') {
            Alert::toast('Permission Error', 'error');
            return redirect()->route('admin.user.index');
        }

        return view('admin.user.edit', [
            'page_title' => $this->page_title,
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function updatePhoto(User $user, Request $request)
    {
        $request->validate([
            'photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        \Illuminate\Support\Facades\DB::transaction(function () use ($request, $user) {
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
        return redirect()->route('admin.user.edit', $user->id);
    }

    public function updateInformation(User $user, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email !== $user->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,except,id'],
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => date('Y-m-d h:i:s', time()),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
            ]);
        }

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.user.edit', $user->id);
    }

    public function updateRole(User $user, Request $request)
    {
        $request->validate([
            'role' => ['required', 'exists:roles,name']
        ]);

        $user->syncRoles($request->role);

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.user.index');
    }
}
