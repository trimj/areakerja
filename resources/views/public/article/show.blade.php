@extends('templates.public.page')

@section('content')
    <section class="max-w-screen-lg">
        <div class="flex flex-col justify-center items-center space-y-2">
            <div class="font-bold text-4xl">{{ $article->title }}</div>
            <div class="flex justify-center items-center space-x-5">
                <div>{{ $article->author->name }}</div>
                <div>{{ date_format($article->created_at, 'd F Y') }}</div>
            </div>
        </div>
        <div class="flex justify-center my-10">
            <img class="rounded-lg shadow max-w-xl" src="{{ asset('assets/public/article/' . $article->image) }}" alt="{{ $article->slug }}">
        </div>
        <div>{!! BBCode::addLinebreakParser()->convertToHtml($article->content) !!}</div>
        <div class="flex flex-col justify-center items-center space-y-2 mt-10">
            <div class="font-semibold text-xl tracking-widest uppercase">Share</div>
            <div class="flex items-center justify-center space-x-5 text-3xl">
                <a href="{{ 'https://pinterest.com/pin/create/button/?url=' . url()->current() . '&description=' . urlencode($article->title) }}" target="_blank"><i class="fab fa-pinterest"></i></a>
                <a href="{{ 'https://www.facebook.com/sharer/sharer.php?u=' . url()->current() . '&t=' . $article->title }}" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="{{ 'https://www.tumblr.com/share?v=3&u=' . url()->current() . '&t=' . $article->title }}" target="_blank"><i class="fab fa-tumblr"></i></a>
                <a href="{{ 'https://twitter.com/intent/tweet?url=' . url()->current() . '&text=' . $article->title }}" target="_blank"><i class="fab fa-twitter-square"></i></a>
                <a href="{{ 'https://www.linkedin.com/sharing/share-offsite/?url=' . url()->current() }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="{{ 'https://wa.me/?text=*' . $article->title . '*%0A' . url()->current() }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </section>
@endsection
