@extends('templates.public.page')

@section('content')
    <section>
        <div class="text-center mb-10">
            <div class="font-bold text-3xl mb-2 uppercase tracking-wide">Mitra List</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse($partners as $mitra)
                <div class="card-group">
                    <img class="photo" src="{{ asset('assets/public/photo') . '/' . $mitra->photo }}" alt="{{ Str::slug($mitra->name) }}" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                    <div class="body">
                        <div class="title">
                            <a href="{{ route('public.mitra.show', $mitra->id) }}" title="{{ $mitra->name }}">{{ $mitra->name }}</a>
                        </div>
                        <div class="desc text-justify truncate">{{ $mitra->description }}</div>
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
        <div class="text-center mb-10">{{ $partners->links() }}</div>
        <div class="mt-20">
            <div class="text-center mb-5">
                <div class="font-semibold text-xl uppercase tracking-wide">Pencarian</div>
            </div>
            <div class="flex items-center justify-center mb-10">
                <form action="{{ route('public.mitra.index') }}" method="get" class="w-[50%]">
                    <div class="textbox-group">
                        <input type="text" name="q" id="q" placeholder="Kotak Pencarian" value="{{ request()->get('q') }}">
                    </div>
                    <div class="flex items-center justify-center space-x-2 space-y-0">
                        <div class="textbox-group">
                            <select name="sort" id="sort">
                                <option value="nama" @if(request()->sort == 'nama') selected @endif>Nama Perusahaan</option>
                                <option value="join" @if(request()->sort == 'join') selected @endif>Bergabung</option>
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
