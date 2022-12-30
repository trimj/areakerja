<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MitraProfileController extends Controller
{
    private $page_title = 'Mitra';

    public function index(Request $request)
    {
        $partners = Partner::join('users', 'users.id', '=', 'partners.user_id')->select('users.name', 'users.photo', 'partners.*');

        if ($request->has('sort')) {
            if ($request->sort == 'name_asc') {
                $partners = $partners->orderBy('name', 'asc');
            } elseif ($request->sort == 'name_desc') {
                $partners = $partners->orderBy('name', 'desc');
            } elseif ($request->sort == 'register_asc') {
                $partners = $partners->orderBy('created_at', 'asc');
            } elseif ($request->sort == 'register_desc') {
                $partners = $partners->orderBy('created_at', 'desc');
            } else {
                $partners = $partners->orderBy('name', 'asc');
            }
        } else {
            $partners = $partners->orderBy('name', 'asc');
        }

        return view('public.mitra.index', [
            'page_title' => $this->page_title,
            'partners' => $partners->get(),
        ]);
    }

    public function show(Partner $mitra)
    {
//        dd(Str::slug($mitra->user->name));
        return redirect()->route('public.mitra.showWithSlug', [$mitra->id, Str::slug($mitra->user->name)]);
    }

    public function showWithSlug(Partner $mitra, $slug)
    {
        if ($slug != Str::slug($mitra->user->name)) {
            return redirect()->route('public.mitra.show', [$mitra->id]);
        }
        
        return view('public.mitra.show', [
            'page_title' => $mitra->user->name . ' - ' . $this->page_title,
            'mitra' => $mitra,
        ]);
    }
}
