@extends('templates.public.page')

@section('content')
    <section>
        <div class="text-center mb-5">
            <div class="font-bold text-3xl mb-2 uppercase tracking-wide">Mitra List</div>
        </div>
        <div class="flex items justify-center mb-10">
            <form action="{{ route('public.mitra.index') }}" method="get">
                <input type="text" name="q" id="q" placeholder="Kotak Pencarian" value="{{ request()->get('q') }}">
            </form>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse($partners as $mitra)
                <div class="card-group">
                    <img class="photo" src="{{ asset('assets/public/photo') . '/' . $mitra->photo }}" alt="{{ Str::slug($mitra->name) }}" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                    <div class="body">
                        <div class="title">
                            <a href="{{ route('public.mitra.show', $mitra->id) }}" title="{{ $mitra->name }}">{{ $mitra->name }}</a>
                        </div>
                        <div class="desc text-justify">{{ $mitra->description }}</div>
                    </div>
                    <div class="footer">
                        <div class="information">
                            <div class="author">
                                <div class="created">
                                    <div class="font-semibold capitalize text-sm">Joined</div>
                                    <div>{{ date_format(date_create($mitra->created_at), 'd F Y') }}</div>
                                </div>
                            </div>
                            <div class="another">
                                <div><span>{{ count($mitra->jobs) }}</span><i class="fas fa-briefcase ml-1 text-areakerja"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center col-span-full text-gray-400">Tidak ada hasil pencarian :(</div>
            @endforelse
        </div>
    </section>
@endsection
