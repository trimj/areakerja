<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use Illuminate\Support\Str;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::orderBy('created_at', 'desc');

        if ($request->has('q') && !empty($request->q)) {
            $query = Str::lower($request->q);
            $articles = $articles->where('title', 'LIKE', '%' . $query . '%');
        }

        return view('public.article.index', [
            'page_title' => 'Tips Kerja',
            'articles' => $articles->paginate(15),
        ]);
    }

    public function show(Article $article)
    {
        return view('public.article.show', [
            'page_title' => $article->title,
            'article' => $article,
        ]);
    }
}
