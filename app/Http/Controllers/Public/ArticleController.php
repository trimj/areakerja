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
        $articles = new Article();

        if ($request->has('q') && !empty($request->q)) {
            $q = Str::lower($request->q);
            $articles = $articles->where('title', 'LIKE', '%' . $q . '%');
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
            if ($request->sort == 'judul') {
                $sortby = 'title';
            } else {
                $sortby = 'created_at';
            }
        } else {
            $sortby = 'created_at';
        }

        return view('public.article.index', [
            'page_title' => 'Tips Kerja',
            'articles' => $articles->orderBy($sortby, $orderby)->paginate(16),
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
