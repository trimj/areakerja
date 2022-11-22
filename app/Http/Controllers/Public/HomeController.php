<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

// Added
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {

        return view('public.home', [
            'articles' => Article::orderBy('created_at', 'desc')->limit(4)->get(),
            'jobs' => JobVacancy::orderBy('created_at', 'desc')->limit(4)->get(),
        ]);
    }
}
