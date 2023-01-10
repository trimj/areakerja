@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="mb-5 text-center">
            @if(!empty($jobCandidate) && $jobCandidate->unlock_id == $candidate->unlocked->id)
                @if(!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate))
                    <span class="badge badge-warning">Requested by Mitra</span>
                @elseif(!empty($jobCandidate->s_mitra) && !empty($jobCandidate->a_candidate) && empty($jobCandidate->r_candidate))
                    <span class="badge badge-success">Accepted by Candidate</span>
                @elseif(!empty($jobCandidate->s_mitra) && empty($jobCandidate->a_candidate) && !empty($jobCandidate->r_candidate))
                    <span class="badge badge-error">Rejected by Candidate</span>
                @elseif(!empty($jobCandidate->s_candidate) && empty($jobCandidate->a_mitra) && empty($jobCandidate->r_mitra))
                    <span class="badge badge-warning">Requested by Candidate</span>
                @elseif(!empty($jobCandidate->s_candidate) && !empty($jobCandidate->a_mitra) && empty($jobCandidate->r_mitra))
                    <span class="badge badge-success">Accepted by Mitra</span>
                @elseif(!empty($jobCandidate->s_candidate) && empty($jobCandidate->a_mitra) && !empty($jobCandidate->r_mitra))
                    <span class="badge badge-error">Rejected by Mitra</span>
                @endif
            @else
                <span class="badge badge-info">Unlocked</span>
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
    <section class="-mt-[3.5rem]">
        <div class="text-center">
            @if(!empty($candidate->unlocked->unlocked_at))
                @if(!empty($jobVacancies->first()) && empty($jobCandidate->s_mitra) && empty($jobCandidate->s_candidate))
                    @can('submit-job-candidate')
                        <form action="{{ route('mitra.lowongan.candidate.submit', ['candidate' => $candidate->id]) }}" method="post" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('put')
                            <div class="textbox-group w-[50%] text-left mx-auto">
                                <label for="lowongan">Lowongan Kerja</label>
                                <select name="lowongan" id="lowongan">
                                    @foreach($jobVacancies as $job)
                                        <option value="{{ $job->id }}">{{ $job->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Request Candidate</button>
                        </form>
                    @endcan
                @endif
            @endif
        </div>
    </section>
@endsection

@section('footerJS')
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
