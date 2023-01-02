@extends('templates.admin.page')

@section('content')
    <section>
        <div class="flex justify-between items-center mb-5">
            <form action="{{ route('admin.article.index') }}" method="get" class="flex space-y-0 space-x-2">
                <div class="textbox-group">
                    <input type="text" name="q" id="q" placeholder="Kotak Pencarian" value="{{ request()->get('q') }}">
                </div>
                <div class="flex items-center justify-center space-x-2 space-y-0">
                    <div class="textbox-group">
                        <select name="sort" id="sort">
                            <option value="judul" @if(request()->sort == 'judul') selected @endif>Judul</option>
                        </select>
                    </div>
                    <div class="textbox-group">
                        <select name="order" id="order">
                            <option value="asc" @if(request()->order == 'asc') selected @endif>Ascending</option>
                            <option value="desc" @if(request()->order == 'desc') selected @endif>Descending</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </div>
            </form>
            @can('create-article')
                <div>
                    <a class="btn btn-primary" href="{{ route('admin.article.create') }}">Add New</a>
                </div>
            @endcan
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
            @forelse ($articles as $article)
                <div class="card-group">
                    <div class="thumbnail">
                        <img src="{{ asset('assets/public/article/thumb/'.$article->image) }}" alt="{{ $article->slug }}" loading="lazy" onerror="this.src='{{ asset('assets/public/images/logo.png') }}'">
                    </div>
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
                                @can('edit-article')
                                    <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-small btn-secondary"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('delete-article')
                                    <form action="{{ route('admin.article.destroy', $article->id) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full m-auto text-gray-400 mt-10">Nothing Here</div>
            @endforelse
        </div>
    </section>
    <section>
        <div class="text-center">{{ $articles->links() }}</div>
    </section>
@endsection
