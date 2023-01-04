@extends('templates.public.page')

@section('content')
    <section>
        <div class="flex flex-grow-0 flex-shrink-0 md:flex-row flex-col">
            <div class="p-3 mr-0 md:mr-10 mb-10 md:mb-0 space-y-10">
                <div class="border-b border-gray-200 space-y-2 pb-5">
                    <div class="capitalize font-bold text-3xl">{{ $jobVacancy->title }}</div>
                    <div class="text-gray-400 font-semibold"><a href="{{ route('public.lowongan.indexSkill', $jobVacancy->main_skill->slug) }}">{{ $jobVacancy->main_skill->name }}</a></div>
                </div>
                <div class="space-y-2">
                    <div class="article">@bb($jobVacancy->description)</div>
                </div>
                <div class="space-y-2">
                    <div class="font-bold text-xl">Keterangan</div>
                    <div class="space-y-2">
                        @if(!empty($jobVacancy->mainSkill))
                            <div class="flex flex-grow-0 flex-shrink-0 space-x-3">
                                <div class="basis-1/3 font-medium">Kompetensi Utama</div>
                                <div><span class="mr-2">:</span><a href="{{ route('public.lowongan.indexSkill', $jobVacancy->main_skill->slug) }}">{{ $jobVacancy->main_skill->name }}</a></div>
                            </div>
                        @endif
                        @if(!empty($jobVacancy->otherSkill))
                            <div class="flex flex-grow-0 flex-shrink-0 space-x-3">
                                <div class="basis-1/3 font-medium">Kompetensi Lain</div>
                                <div><span class="mr-2">:</span>{{ $jobVacancy->otherSkill }}</div>
                            </div>
                        @endif
                        @if(!empty($jobVacancy->minSalary))
                            <div class="flex flex-grow-0 flex-shrink-0 space-x-3">
                                <div class="basis-1/3 font-medium">Minimum Salary</div>
                                <div><span class="mr-2">:</span>Rp. {{ number_format($jobVacancy->minSalary, 0) }}</div>
                            </div>
                        @endif
                        @if(!empty($jobVacancy->maxSalary))
                            <div class="flex flex-grow-0 flex-shrink-0 space-x-3">
                                <div class="basis-1/3 font-medium">Maximum Salary</div>
                                <div><span class="mr-2">:</span>Rp. {{ number_format($jobVacancy->maxSalary, 0) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="font-bold text-xl">&nbsp;</div>
                    <div class="flex justify-between">
                        <div class="basis-2/3 text-left space-y-2">
                            <div class="font-bold text-xl">
                                <a href="{{ route('public.mitra.showWithSlug', [$jobVacancy->mitra->id, Str::slug($jobVacancy->mitra->user->name)]) }}">{{ $jobVacancy->mitra->user->name }}</a>
                            </div>
                            <div class="text-justify">{{ $jobVacancy->mitra->description }}</div>
                        </div>
                        <div class="text-right">
                            <img class="w-36 h-36 border border-gray-300 shadow rounded-md" src="{{ asset('assets/public/photo') . '/' . $jobVacancy->mitra->user->photo }}" alt="{{ $jobVacancy->mitra->user->name }}" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 basis-1/3 p-3 space-y-10">
                @can('register-job-for-me')
                    <div>
                        <form action="{{ route('kandidat.lowongan.registerJobForMe', $jobVacancy->id) }}" method="post" class="w-full">
                            @csrf
                            @if(!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate))
                                <div class="alert alert-warning text-center">Requested by Mitra</div>
                            @elseif(!empty($jobCandidate->s_mitra) && !empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate))
                                <div class="alert alert-success text-center">Accepted by Candidate</div>
                            @elseif(!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && !empty($jobCandidate->r_candidate))
                                <div class="alert alert-error text-center">Rejected by Candidate</div>
                            @elseif(!empty($jobCandidate->s_candidate) && empty($jobCandidate->a_mitra) && empty($jobCandidate->r_mitra))
                                <div class="alert alert-warning text-center">Requested by Candidate</div>
                            @elseif(!empty($jobCandidate->s_candidate) && !empty($jobCandidate->a_mitra) && empty($jobCandidate->r_mitra))
                                <div class="alert alert-success text-center">Accepted by Mitra</div>
                            @elseif(!empty($jobCandidate->s_candidate) && empty($jobCandidate->a_mitra) && !empty($jobCandidate->r_mitra))
                                <div class="alert alert-error text-center">Rejected by Mitra</div>
                            @else
                                <button class="btn btn-primary uppercase w-full">Lamar Kerja</button>
                            @endif
                        </form>
                    </div>
                @endcan
                <div>
                    <div class="font-bold text-xl uppercase mb-3">Kontak</div>
                    <div class="p-5 border border-gray-300 rounded-md shadow-md space-y-3">
                        <div class="flex justify-between">
                            <div class="capitalize">Email:</div>
                            <div class="basis-2/3 break-normal text-right">
                                <a href="{{ 'mailto:'.$jobVacancy->mitra->email }}">{{ $jobVacancy->mitra->email ?? '-' }}</a>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="capitalize">Telepon:</div>
                            <div class="basis-2/3 break-words text-right">{{ !empty($jobVacancy->mitra->phone) ? '(+62) '.$jobVacancy->mitra->phone : '-' }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="capitalize">Website:</div>
                            <div class="basis-2/3 break-words text-right">
                                <a href="{{ !empty($mitra->website) ? 'https://'.parse_url($mitra->website, PHP_URL_HOST) : '#' }}" target="_blank">{{ !empty($jobVacancy->mitra->website) ? parse_url($jobVacancy->mitra->website, PHP_URL_HOST) : '-' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="font-bold text-xl uppercase mb-3">Lokasi</div>
                    <div class="p-5 border border-gray-300 rounded-md shadow-md space-y-3">
                        @foreach( array_reverse($jobVacancy->mitra->address) as $key => $address)
                            <div class="flex justify-between">
                                <div class="capitalize">{{ $key }}:</div>
                                <div class="basis-2/3 break-words text-right">
                                    @if($key != 'jalan')
                                        <a href="{{ route('public.lowongan.indexLocation', $jobVacancy->mitra->address[$key]) }}" id="{{ $key }}">{{ $jobVacancy->mitra->address[$key] }}</a>
                                    @else
                                        {{ $jobVacancy->mitra->address[$key] }}
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
            Provinsi({{ $jobVacancy->mitra->address['provinsi'] }});
            Kota({{ $jobVacancy->mitra->address['kota'] }});
            Kecamatan({{ $jobVacancy->mitra->address['kecamatan'] }});
            Kelurahan({{ $jobVacancy->mitra->address['kelurahan'] }});
        });
    </script>
@endsection
