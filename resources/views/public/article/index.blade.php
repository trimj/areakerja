@extends('templates.public.page')

@section('content')
    <section>
        <div class="text-center mb-10">
            <div class="font-bold text-3xl mb-2 uppercase tracking-wide">Tips Kerja</div>
            <div class="capitalize">Pelajari Tips - Tips Kerja yang Telah Kami Buat Untuk Anda</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
            @forelse ($articles as $article)
                <div class="card-group">
                    <img class="thumbnail" src="{{ asset('assets/public/article/thumb/'.$article->image) }}" alt="image" loading="lazy" onerror="this.src='{{ asset('assets/public/images/logo.png') }}'">
                    <div class="body">
                        <div class="title">
                            <a href="{{ route('public.article.show', $article->id) }}">{{ $article->title }}</a>
                        </div>
                        <div class="desc">{{ preg_replace('|[[\/\!]*?[^\[\]]*?]|si','',strip_tags(Str::limit($article->content, 100))) }}</div>
                    </div>
                    <div class="footer">
                        <div class="information">
                            <div class="author">
                                <img src="{{ asset('assets/public/photo') . '/' . $article->author->photo }}" alt="image" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                                <div>
                                    <div class="name">{{ $article->author->name }}</div>
                                    <div class="created">{{ date_format($article->created_at, 'd F Y') }}</div>
                                </div>
                            </div>
                            @if(date_diff(date_create($article->created_at), date_create(now()))->format('%d') < 3)
                                <div class="another">
                                    <div class="new-badge">NEW</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center col-span-full text-gray-400">Tidak ada hasil pencarian :(</div>
            @endforelse
        </div>
        <div class="text-center mb-10">{{ $articles->links() }}</div>
        <div class="mt-20">
            <div class="text-center mb-5">
                <div class="font-semibold text-xl uppercase tracking-wide">Pencarian</div>
            </div>
            <div class="flex items-center justify-center mb-10">
                <form action="{{ route('public.article.index') }}" method="get" class="w-[50%]">
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
            </div>
        </div>
    </section>
@endsection
