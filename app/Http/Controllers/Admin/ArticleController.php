<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Added
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Article;
use Image;
use Alert;


class ArticleController extends Controller
{
    protected $page_title = 'Manage Article';

    public function __construct()
    {
        $this->middleware('can:manage-article')->only('index');
        $this->middleware('can:create-article')->only('create', 'store');
        $this->middleware('can:edit-article')->only('edit', 'update');
        $this->middleware('can:delete-article')->only('destroy');
    }

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

        return view('admin.article.index', [
            'page_title' => $this->page_title,
            'articles' => $articles->orderBy($sortby, $orderby)->paginate(16),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'artImage' => ['required', 'image', 'dimensions:min_width=500,min_height=300'],
            'artTitle' => ['required', 'string', 'max:100'],
            'artContent' => ['required', 'string', 'max:65535']
        ]);

        DB::transaction(function () use ($request) {
            if ($request->hasfile('artImage')) {
                $img = Image::make($request->file('artImage'));

                if ($img->width() > 1000 || $img->height() > 565) {
                    $largeImg = $img->resize(1000, 565, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $largeImg = $img;
                }

                $largeImgName = time() . '.' . $request->file('artImage')->extension();
                $largeImg->save(public_path('assets/public/article/' . $largeImgName));

                if ($img->width() > 535 || $img->height() > 300) {
                    $smallImg = $img->resize(535, 300, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $smallImg = $img;
                }

                $smallImgName = time() . '.' . $request->file('artImage')->extension();
                $smallImg->save(public_path('assets/public/article/thumb/' . $smallImgName));

                $largeImg->destroy();
                $smallImg->destroy();
                $img->destroy();
            } else {
                $largeImgName = null;
            }

            Article::create([
                'user_id' => auth()->user()->id,
                'title' => $request->artTitle,
                'slug' => Str::slug($request->artTitle, '-'),
//                'content' => str_replace(["\r\n", "\r", "\n"], "\n", $request->artContent),
                'content' => strip_tags($request->artContent),
                'image' => $largeImgName,
            ]);
        });

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.article.index');
    }

    public function destroy(Article $article)
    {
        DB::transaction(function () use ($article) {
            if (!empty($article->image)) {
                File::delete(public_path('assets/public/article/' . $article->image));
                File::delete(public_path('assets/public/article/thumb/' . $article->image));
            }

            $article->delete();
        });

        return redirect()->route('admin.article.index');
    }

    public function create()
    {
        return view('admin.article.create', [
            'page_title' => $this->page_title,
        ]);
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', [
            'page_title' => $this->page_title,
            'article' => $article,
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'artImage' => ['nullable', 'image', 'dimensions:min_width=500,min_height=300'],
            'artTitle' => ['required', 'string', 'max:100'],
            'artContent' => ['required', 'string', 'max:65535']
        ]);

        DB::transaction(function () use ($request, $article) {
            if ($request->hasfile('artImage')) {
                if (!empty($article->image)) {
                    File::delete(public_path('assets/public/article/' . $article->image));
                    File::delete(public_path('assets/public/article/thumb/' . $article->image));
                }

                $img = Image::make($request->file('artImage'));

                if ($img->width() > 1000 || $img->height() > 565) {
                    $largeImg = $img->resize(1000, 565, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $largeImg = $img;
                }

                $largeImgName = time() . '.' . $request->file('artImage')->extension();
                $largeImg->save(public_path('assets/public/article/' . $largeImgName));

                if ($img->width() > 535 || $img->height() > 300) {
                    $smallImg = $img->resize(535, 300, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $smallImg = $img;
                }

                $smallImgName = time() . '.' . $request->file('artImage')->extension();
                $smallImg->save(public_path('assets/public/article/thumb/' . $smallImgName));

                $largeImg->destroy();
                $smallImg->destroy();
                $img->destroy();
            } else {
                $largeImgName = $article->image;
            }

            Article::where('id', $article->id)->update([
                'title' => $request->artTitle,
                'slug' => Str::slug($request->artTitle, '-'),
//                'content' => str_replace(["\r\n", "\r", "\n"], "\n", $request->artContent),
                'content' => strip_tags($request->artContent),
                'image' => $largeImgName,
            ]);
        });

        return redirect()->route('admin.article.index');
    }
}
