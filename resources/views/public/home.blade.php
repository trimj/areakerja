@extends('templates.public.page')

@section('headerCSS')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <section class="section1">
        <img class="bg-img" src="{{ asset('assets/public/images/logo.png') }}" alt="image">
        <div class="flex items-center justify-center lg:justify-between">
            <div class="lg:basis-2/3 space-y-10">
                <div class="space-y-3 text-center lg:text-left">
                    <div class="font-semibold text-areakerja text-xl">Tempat Mencari Kerja</div>
                    <div class="font-bold text-3xl md:text-4xl lg:text-5xl lg:w-2/3">Temukan Loker Jogja Terbaru dengan Mudah</div>
                    <div>Ayo Cari Lowongan Terbaru</div>
                </div>
                <div class="text-center lg:text-left">
                    <a href="#" class="btn btn-primary">Cari Kerja <i class="fas fa-arrow-right fa-fw"></i></a>
                </div>
            </div>
            <div class="lg:basis-1/3 hidden lg:block">
                <img src="{{ asset('assets/public/images/home/image01.svg') }}" alt="image01">
            </div>
        </div>
    </section>
    <section class="section2">
        <div class="feature1">
            <div class="icon"><i class="fas fa-thumbs-up"></i></div>
            <div class="info">
                <div class="title">Title</div>
                <div class="desc">Desc</div>
            </div>
        </div>
        <div class="feature2">
            <div class="icon"><i class="fas fa-star"></i></div>
            <div class="info">
                <div class="title">Title</div>
                <div class="desc">Desc</div>
            </div>
        </div>
        <div class="feature3">
            <div class="icon"><i class="fas fa-headset"></i></div>
            <div class="info">
                <div class="title">Title</div>
                <div class="desc">Desc</div>
            </div>
        </div>
        <div class="feature4">
            <div class="icon"><i class="fas fa-handshake"></i></div>
            <div class="info">
                <div class="title">Title</div>
                <div class="desc">Desc</div>
            </div>
        </div>
    </section>
    <section class="section3">
        <div class="text-center mb-10">
            <div class="font-bold text-3xl mb-2 uppercase tracking-wide">Rekomendasi Lowongan Kerja</div>
            <div class="capitalize">Coba Lowongan Kerja Rekomendasi dari kami</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="card-group">
                <img class="thumbnail p-5" src="#" alt="image" loading="lazy" onerror="this.src='{{ asset('assets/public/images/logo.png') }}'">
                <div class="body">
                    <div class="title">
                        <a href="#">Laravel Programmer (Backend)</a>
                    </div>
                    <div class="desc">
                        <div class="jobdesc">
                            <div class="font-semibold">Main Skill:</div>
                            <div>Backend Programmer</div>
                        </div>
                        <div class="jobdesc">
                            <div class="font-semibold">Salary:</div>
                            <div>Rp. {{ number_format(7000000, 0) }}</div>
                        </div>
                        <div class="jobdesc">
                            <div class="font-semibold">Location:</div>
                            <div>D.I. Yogyakarta</div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="information">
                        <div class="author">
                            <img src="#" alt="avatar" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                            <div>
                                <div class="name">Seven Inc</div>
                                <div class="created">{{ date_format(date_create(now()), 'd F Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="w-full hidden lg:block">
                <img src="{{ asset('assets/public/images/home/image02.svg') }}" alt="image02">
            </div>
            <div class="space-y-16 text-center lg:text-left">
                <div class="font-bold text-5xl">Tentang Area Kerja</div>
                <div class="flex flex-col">
                    <div class="mx-auto lg:ml-auto lg:mr-10">
                        <div class="flex border border-indigo-300 rounded-2xl w-80 px-5 py-3 relative">
                            <div>
                                <div class="font-bold text-xl mb-1">Mencari Lowongan</div>
                                <div class="text-gray-500 leading-5">The sixth course in a program that will equip you with the skills</div>
                            </div>
                            <div class="absolute right-0 top-0">
                                <div class="bg-indigo-400 rounded-lg px-2.5 py-0.5 text-white font-semibold translate-x-2.5 -translate-y-2.5">01</div>
                            </div>
                        </div>
                    </div>
                    <div class="my-10 mx-auto lg:ml-10">
                        <div class="flex border border-orange-300 rounded-2xl w-80 px-5 py-3 relative">
                            <div>
                                <div class="font-bold text-xl mb-1">Mencari Lowongan</div>
                                <div class="text-gray-500 leading-5">The sixth course in a program that will equip you with the skills</div>
                            </div>
                            <div class="absolute right-0 top-0">
                                <div class="bg-orange-400 rounded-lg px-2.5 py-0.5 text-white font-semibold translate-x-2.5 -translate-y-2.5">01</div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <div class="flex border border-teal-300 rounded-2xl w-80 px-5 py-3 relative">
                            <div>
                                <div class="font-bold text-xl mb-1">Mencari Lowongan</div>
                                <div class="text-gray-500 leading-5">The sixth course in a program that will equip you with the skills</div>
                            </div>
                            <div class="absolute right-0 top-0">
                                <div class="bg-teal-400 rounded-lg px-2.5 py-0.5 text-white font-semibold translate-x-2.5 -translate-y-2.5">01</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="#" class="btn btn-primary">Cari Lowongan Kerja <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="section5">
        <div class="text-center mb-10">
            <div class="font-bold text-3xl mb-2 uppercase tracking-wide">Tips Kerja</div>
            <div class="capitalize">Pelajari Tips - Tips Kerja yang Telah Kami Buat Untuk Anda</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
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
                                <img src="{{ asset('assets/public/photo') . '/' . $article->author->photo }}" alt="avatar" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
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
            @endforelse
        </div>
        <div class="mt-10 text-center">
            <a class="btn btn-tertiary" href="{{ route('public.article.index') }}">Load More</a>
        </div>
    </section>
@endsection
