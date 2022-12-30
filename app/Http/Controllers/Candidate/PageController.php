<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $page_title = 'Kandidat CP';

    public function __construct()
    {
        $this->middleware('can:access-kandidatcp');
    }

    public function dashboard()
    {
        return view('candidate.dashboard', [
            'page_title' => $this->page_title,
        ]);
    }
}
