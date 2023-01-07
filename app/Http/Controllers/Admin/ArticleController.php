<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Admin\ArticleStoreRequest;
use App\Http\Requests\Article\Admin\ArticleUpdateRequest;
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

    public function store(ArticleStoreRequest $storeRequest)
    {
        $validated = $storeRequest->validated();

        DB::transaction(function () use ($validated, $storeRequest) {
            if ($storeRequest->hasfile('artImage')) {
                $img = Image::make($validated['artImage']);

                if ($img->width() > 1000 || $img->height() > 565) {
                    $largeImg = $img->resize(1000, 565, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $largeImg = $img;
                }

                $largeImgName = time() . '.' . $validated['artImage']->extension();
                $largeImg->save(public_path('assets/public/article/' . $largeImgName));

                if ($img->width() > 535 || $img->height() > 300) {
                    $smallImg = $img->resize(535, 300, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $smallImg = $img;
                }

                $smallImgName = time() . '.' . $validated['artImage']->extension();
                $smallImg->save(public_path('assets/public/article/thumb/' . $smallImgName));

                $largeImg->destroy();
                $smallImg->destroy();
                $img->destroy();
            } else {
                $largeImgName = null;
            }

            Article::create([
                'user_id' => auth()->user()->id,
                'title' => $validated['artTitle'],
                'slug' => Str::slug($validated['artTitle'], '-'),
//                'content' => strip_tags(str_replace(["\r\n", "\r", "\n"], "\n", $validated['artContent'])),
                'content' => strip_tags($validated['artContent']),
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

        Alert::toast('Successful', 'success');
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

    public function update(ArticleUpdateRequest $updateRequest, Article $article)
    {
        $validated = $updateRequest->validated();

        DB::transaction(function () use ($validated, $updateRequest, $article) {
            if ($updateRequest->hasfile('artImage')) {
                if (!empty($article->image)) {
                    File::delete(public_path('assets/public/article/' . $article->image));
                    File::delete(public_path('assets/public/article/thumb/' . $article->image));
                }

                $img = Image::make($validated['artImage']);

                if ($img->width() > 1000 || $img->height() > 565) {
                    $largeImg = $img->resize(1000, 565, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $largeImg = $img;
                }

                $largeImgName = time() . '.' . $validated['artImage']->extension();
                $largeImg->save(public_path('assets/public/article/' . $largeImgName));

                if ($img->width() > 535 || $img->height() > 300) {
                    $smallImg = $img->resize(535, 300, function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $smallImg = $img;
                }

                $smallImgName = time() . '.' . $validated['artImage']->extension();
                $smallImg->save(public_path('assets/public/article/thumb/' . $smallImgName));

                $largeImg->destroy();
                $smallImg->destroy();
                $img->destroy();
            } else {
                $largeImgName = $article->image;
            }

            Article::where('id', $article->id)->update([
                'title' => $validated['artTitle'],
                'slug' => Str::slug($validated['artTitle'], '-'),
//                'content' => strip_tags(str_replace(["\r\n", "\r", "\n"], "\n", $validated['artContent'])),
                'content' => strip_tags($validated['artContent']),
                'image' => $largeImgName,
            ]);
        });

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.article.index');
    }
}
