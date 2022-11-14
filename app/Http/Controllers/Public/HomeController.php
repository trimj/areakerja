<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->limit(4)->get();

        return view('public.home', [
            'articles' => $articles,
        ]);
    }
}
