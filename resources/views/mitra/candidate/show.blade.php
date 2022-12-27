@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="mb-3">
            @if(!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate))
                <div class="alert alert-warning text-center">Requested by Mitra<br><span class="text-xs">{{ date_format($jobCandidate->s_mitra, 'd F Y, H:i') }}</span></div>
            @elseif(!empty($jobCandidate->s_mitra) && !empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate))
                <div class="alert alert-success text-center">Accepted by Candidate<br><span class="text-xs">{{ date_format($jobCandidate->s_mitra, 'd F Y, H:i') }}</span></div>
            @elseif(!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && !empty($jobCandidate->r_candidate))
                <div class="alert alert-error text-center">Rejected by Candidate<br><span class="text-xs">{{ date_format($jobCandidate->s_mitra, 'd F Y, H:i') }}</span></div>
            @endif
        </div>
        <div class="table-group">
            <table class="table-fixed">
                <thead>
                <tr>
                    <th class="w-80">Attributes</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="font-semibold">Photo</td>
                    <td>
                        <img class="rounded-md w-32 h-32" src="{{ asset('assets/public/photo' . '/' . $candidate->user->photo) }}" alt="photo" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}';">
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Name</td>
                    <td>{{ $candidate->user->name }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Tanggal Lahir</td>
                    <td><span id="birthday"></span><span id="age" class="ml-5"></span></td>
                </tr>
                <tr>
                    <td class="font-semibold">Alamat</td>
                    <td><span>{{ $candidate->address['jalan'] }}</span>, <span id="kelurahan">{{ $candidate->address['kelurahan'] }}</span>, <span id="kecamatan">{{ $candidate->address['kecamatan'] }}</span>, <span id="kota">{{ $candidate->address['kota'] }}</span>, <span id="provinsi">{{ $candidate->address['provinsi'] }}</span></td>
                </tr>
                <tr>
                    <td class="font-semibold">Kompetensi Utama</td>
                    <td>{{ $candidate->main_skill->name }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Kompetensi Lain</td>
                    <td>
                        @if(!empty($candidate->skill))
                            @foreach($candidate->skill as $skill)
                                <div>{{ $skill }}</div>
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Riwayat Pembelajaran</td>
                    <td>
                        @if(!empty($candidate->education))
                            @foreach($candidate->education as $education)
                                <div>
                                    <div class="font-semibold">{{ $education['name'] }}</div>
                                    <div>{{ $education['location'] }} ({{ $education['from'] }} ~ {{ $education['to'] }})</div>
                                </div><br>
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Sertifikat</td>
                    <td>
                        @if(!empty($candidate->certificate))
                            @foreach($candidate->certificate as $certificate)
                                <div>
                                    <div class="font-semibold">{{ $certificate['title'] }}</div>
                                    <div>{{ $certificate['get'] }}</div>
                                </div><br>
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Pengalaman</td>
                    <td>
                        @if(!empty($candidate->experience))
                            @foreach($candidate->experience as $experience)
                                <div>
                                    <div class="font-semibold">{{ $experience['title'] }}</div>
                                    <div>{{ $experience['location'] }} ({{ $experience['from'] }} ~ {{ $experience['to'] }})</div>
                                </div><br>
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div class="text-right">
            @if(!empty($jobCandidate) && $jobCandidate->unlocked == true && empty($jobCandidate->r_mitra))
                @if(empty($jobCandidate->s_mitra) && empty($jobCandidate->s_candidate))
                    @can('submit-job-candidate')
                        <form action="{{ route('mitra.lowongan.candidate.submit', ['jobVacancy' => $jobCandidate->job_id, 'candidate' => $candidate->id]) }}" method="post" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-success">Submit Candidate</button>
                        </form>
                    @endcan
                @endif
                @if(!empty($jobCandidate->s_candidate) && empty($jobCandidate->a_mitra) && empty($jobCandidate->r_mitra))
                    @can('accept-job-candidate')
                        <form action="#" method="post" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add Candidate</button>
                        </form>
                    @endcan
                    @can('reject-job-candidate')
                        <form action="#" method="post" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            <button type="submit" class="btn btn-error">Reject Candidate</button>
                        </form>
                    @endcan
                @else
                    @can('remove-job-candidate')
                        <form action="#" method="post" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            <button type="submit" class="btn btn-error">Reject Candidate</button>
                        </form>
                    @endcan
                @endif
            @endif
        </div>
    </section>
@endsection

@section('footerJS')
    @include('templates.member.location.provinsi')
    @include('templates.member.location.kota')
    @include('templates.member.location.kecamatan')
    @include('templates.member.location.kelurahan')
    <script>
        function birthdate(date) {
            var options = {day: 'numeric', month: 'long', year: 'numeric'};
            var birthday = new Date(date);
            document.getElementById("birthday").innerHTML = birthday.toLocaleDateString("id-ID", options);
        }

        function getAge(date) {
            var calcAge = Math.floor((new Date() - new Date(date).getTime()) / 3.15576e+10);
            document.getElementById('age').innerHTML = '(' + calcAge + ' Tahun)';
        }

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
            birthdate('{{ $candidate->birthday ?? null }}');
            getAge('{{ $candidate->birthday ?? null }}');

            Provinsi({{ $candidate->address['provinsi'] ?? null }});
            Kota({{ $candidate->address['kota'] ?? null }});
            Kecamatan({{ $candidate->address['kecamatan'] ?? null }});
            Kelurahan({{ $candidate->address['kelurahan'] ?? null }});
        });
    </script>
@endsection
