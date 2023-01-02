@extends('templates.public.page')

@section('content')
    <section>
        <div class="text-center mb-10">
            <div class="font-bold text-3xl mb-2 uppercase tracking-wide">Lowongan Kerja</div>
            <div class="capitalize">Coba Lowongan Kerja Rekomendasi dari kami</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
            @forelse($jobs as $job)
                <div class="card-group">
                    <div class="body">
                        <div class="title">
                            <a href="{{ route('public.lowongan.showWithSlug', [$job->id, $job->slug]) }}">{{ $job->title }}</a>
                        </div>
                        <div class="desc mt-5">
                            <div class="jobdesc">
                                <div class="font-semibold">Main Skill:</div>
                                <div>
                                    <a href="{{ route('public.lowongan.indexSkill', $job->main_skill->slug) }}">{{ $job->main_skill->name }}</a>
                                </div>
                            </div>
                            <div class="jobdesc">
                                <div class="font-semibold">Salary:</div>
                                <div>Rp. {{ number_format($job->maxSalary, 0) }}</div>
                            </div>
                            <div class="jobdesc">
                                <div class="font-semibold">Location:</div>
                                <div>
                                    <a href="{{ route('public.lowongan.indexLocation', $job->address['provinsi']) }}" id="{{ 'provinsi' . $job->id }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="information">
                            <div class="author">
                                <img src="{{ asset('assets/public/photo') . '/' . $job->mitra->user->photo }}" alt="{{ $job->mitra->user->name }}" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                                <div>
                                    <div class="name"><a href="{{ route('public.mitra.showWithSlug', [$job->mitra->id, Str::slug($job->mitra->user->name)]) }}">{{ $job->mitra->user->name }}</a></div>
                                    <div class="created">{{ date_format(date_create($job->deadline), 'd F Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center col-span-full text-gray-400">Tidak ada hasil pencarian :(</div>
            @endforelse
        </div>
        <div class="text-center mb-10">{{ $jobs->links() }}</div>
        <div class="mt-20">
            <div class="text-center mb-5">
                <div class="font-semibold text-xl uppercase tracking-wide">Pencarian</div>
            </div>
            <div class="flex items-center justify-center mb-10">
                <form action="{{ route('public.lowongan.index') }}" method="get" class="w-[50%]">
                    <div class="textbox-group">
                        <input type="text" name="q" id="q" placeholder="Kotak Pencarian" value="{{ request()->get('q') }}">
                    </div>
                    <div class="flex items-center justify-center space-x-2 space-y-0">
                        <div class="textbox-group">
                            <select name="sort" id="sort">
                                <option value="judul" @if(request()->sort == 'judul') selected @endif>Judul</option>
                                <option value="deadline" @if(request()->sort == 'deadline') selected @endif>Deadline</option>
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

@section('footerJS')
    <script>
        function Provinsi(divId, id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById(divId).innerHTML = data.nama;
            });
        }
    </script>
    <script>
        window.addEventListener("load", (event) => {
            @foreach($jobs as $job)
            Provinsi('{{ 'provinsi' . $job->id }}', {{ $job->address['provinsi'] }})
            @endforeach
        });
    </script>
@endsection
