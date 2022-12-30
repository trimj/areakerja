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
        $partners = new Partner();

        if ($request->has('q') && !empty($request->q)) {
            $q = Str::lower($request->q);
            $partners = $partners->where('name', 'LIKE', '%' . $q . '%');
        }

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
            if ($request->sort == 'nama') {
                $sortby = 'name';
            } elseif ($request->sort == 'join') {
                $sortby = 'created_at';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('public.mitra.index', [
            'page_title' => $this->page_title,
            'partners' => $partners->join('users', 'users.id', '=', 'partners.user_id')
                ->select('users.name', 'users.photo', 'partners.*')
                ->orderBy($sortby, $orderby)->paginate(16),
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
