@extends('templates.public.page')

@section('content')
    <section>
        <div class="flex flex-grow-0 flex-shrink-0 md:flex-row flex-col">
            <div class="p-3 mr-0 md:mr-10 mb-10 md:mb-0 space-y-10">
                <div class="border-b border-gray-200 space-y-2 pb-5">
                    <div class="font-bold text-xl">&nbsp;</div>
                    <div class="flex justify-between">
                        <div class="basis-2/3 text-left space-y-2">
                            <div class="font-bold text-3xl">{{ $mitra->user->name }}</div>
                            <div class="text-justify">{{ $mitra->description }}</div>
                        </div>
                        <div class="text-right">
                            <img class="w-36 h-36 border border-gray-300 shadow rounded-md" src="{{ asset('assets/public/photo') . '/' . $mitra->user->photo }}" alt="{{ $mitra->user->name }}" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="font-bold text-xl">Lowongan Kerja</div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                        @forelse($mitra->jobs as $job)
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
                                    </div>
                                </div>
                                <div class="footer">
                                    <div class="information">
                                        <div class="author">
                                            <div>
                                                <div class="created">
                                                    <div class="font-semibold capitalize text-sm">Deadline</div>
                                                    <div>{{ date_format(date_create($job->deadline), 'd F Y H:i') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">Nothing Here</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 basis-1/3 p-3 space-y-10">
                <div>
                    <div class="font-bold text-xl uppercase mb-3">Kontak</div>
                    <div class="p-5 border border-gray-300 rounded-md shadow-md space-y-3">
                        <div class="flex justify-between">
                            <div class="capitalize">Email:</div>
                            <div class="basis-2/3 break-normal text-right">
                                <a href="{{ 'mailto:'.$mitra->email }}">{{ $mitra->email ?? '-' }}</a>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="capitalize">Telepon:</div>
                            <div class="basis-2/3 break-words text-right">{{ !empty($mitra->phone) ? '(+62) '.$mitra->phone : '-' }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="capitalize">Website:</div>
                            <div class="basis-2/3 break-words text-right">
                                <a href="{{ !empty($mitra->website) ? 'https://'.parse_url($mitra->website, PHP_URL_HOST) : '#' }}" target="_blank">{{ !empty($mitra->website) ? parse_url($mitra->website, PHP_URL_HOST) : '-' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="font-bold text-xl uppercase mb-3">Lokasi</div>
                    <div class="p-5 border border-gray-300 rounded-md shadow-md space-y-3">
                        @foreach( array_reverse($mitra->address) as $key => $address)
                            <div class="flex justify-between">
                                <div class="capitalize">{{ $key }}:</div>
                                <div class="basis-2/3 break-words text-right">
                                    @if($key != 'jalan')
                                        <a href="{{ route('public.lowongan.indexLocation', $mitra->address[$key]) }}" id="{{ $key }}">{{ $mitra->address[$key] }}</a>
                                    @else
                                        {{ $mitra->address[$key] }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footerJS')
    <script>
        function Provinsi(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('provinsi').innerHTML = data.nama;
            });
        }

        function Kota(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kota/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('kota').innerHTML = data.nama;
            });
        }

        function Kecamatan(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('kecamatan').innerHTML = data.nama;
            });
        }

        function Kelurahan(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('kelurahan').innerHTML = data.nama;
            });
        }
    </script>
    <script>
        window.addEventListener("load", (event) => {
            Provinsi({{ $mitra->address['provinsi'] }});
            Kota({{ $mitra->address['kota'] }});
            Kecamatan({{ $mitra->address['kecamatan'] }});
            Kelurahan({{ $mitra->address['kelurahan'] }});
        });
    </script>
@endsection
