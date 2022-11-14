@extends('templates.admin.page')

@section('content')
    <div class="text-right mb-5">
        <a class="btn btn-primary" href="{{ route('admin.article.create') }}">Add New</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse ($articles as $article)
            <div class="card-group">
                <img class="thumbnail" src="{{ asset('assets/public/article/thumb/'.$article->image) }}" alt="" loading="lazy" onerror="this.src='{{ asset('assets/public/images/logo.png') }}'">
                <div class="body">
                    <div class="title">
                        <a href="{{ route('public.article.show', $article->id) }}" target="_blank">{{ $article->title }}</a>
                    </div>
                    <div class="desc">{{ preg_replace('|[[\/\!]*?[^\[\]]*?]|si','',strip_tags(Str::limit($article->content, 100))) }}</div>
                </div>
                <div class="footer">
                    <div class="information">
                        <div class="author">
                            <img src="{{ asset('assets/public/photo') . '/' . $article->author->photo }}" alt="avatar" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                            <div>
                                <div class="name">{{ $article->author->name }}</div>
                                <div class="created">{{ date_format($article->created_at, 'd F Y') }}</div>
                            </div>
                        </div>
                        <div class="another inline-flex">
                            <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-small btn-secondary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.article.destroy', $article->id) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
