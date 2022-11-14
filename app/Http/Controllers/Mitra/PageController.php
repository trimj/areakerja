<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $page_title = 'Mitra CP';

    public function __construct()
    {
        $this->middleware('can:access-mitracp');
    }

    public function dashboard()
    {
        return view('mitra.dashboard', [
            'page_title' => $this->page_title,
        ]);
    }
}
