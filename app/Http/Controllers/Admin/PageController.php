<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $page_title = 'Admin CP';

    public function __construct()
    {
        $this->middleware('can:access-admincp');
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'page_title' => $this->page_title,
        ]);
    }
}
