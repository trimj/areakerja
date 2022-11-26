@extends('templates.mitra.page')

@section('content')
    <section>
        <censored-style censorship-tag="censored" censorship-type="marker" censorship-color="#FF9637" replace-text="*" replace-repeat="true" dissapear-on-hover="false">
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
                        <td><span id="provinsi">{{ $candidate->address['provinsi'] }}</span></td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Kompetensi Utama</td>
                        <td>
                            <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Kompetensi Lain</td>
                        <td>
                            @if(!empty($candidate->skill))
                                @foreach($candidate->skill as $skill)
                                    <div>
                                        <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                                    </div>
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
                                        <div class="font-semibold">
                                            <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                                        </div>
                                        <div>
                                            <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                                        </div>
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
                                        <div class="font-semibold">
                                            <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                                        </div>
                                        <div>
                                            <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                                        </div>
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
                                        <div class="font-semibold">
                                            <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                                        </div>
                                        <div>
                                            <censored>{{ Str::random(random_int(15, 40)) }}</censored>
                                        </div>
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
        </censored-style>
    </section>
    <section>
        <div class="text-right">
            @if(empty($jobCandidate) || $jobCandidate->unlocked == false)
                @can('unlock-job-candidate')
                    <form action="{{ route('mitra.lowongan.candidate.unlock', ['job' => $job->id, 'candidate' => $candidate->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Unlock Candidate</button>
                    </form>
                @endcan
            @endif
        </div>
    </section>
@endsection

@section('headerJS')
    <script src="https://cdn.jsdelivr.net/gh/Kilimanjaro-a2/censored-style-js@gh-pages/censored-style.js"></script>
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
    </script>
    <script>
        window.addEventListener("load", (event) => {
            birthdate('{{ $candidate->birthday ?? null }}');
            getAge('{{ $candidate->birthday ?? null }}');

            Provinsi({{ $candidate->address['provinsi'] ?? null }});
        });
    </script>
@endsection
