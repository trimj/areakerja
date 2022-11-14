@extends('templates.public.page')

@section('content')
    @include('templates.member.candidate.steps')
    <section>
        <div class="font-bold text-2xl mb-5">Basic Information</div>
        <form action="{{ route('member.daftar.kandidat.information.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 space-y-0">
                <div class="space-y-2">
                    <label for="photo">Photo</label>
                    <div class="flex items-center space-x-5">
                        <img class="w-28 rounded-full border-2 border-areakerja/50" src="{{ asset('assets/public/photo').'/'.auth()->user()->photo }}" alt="" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                        <a href="{{ route('member.settings') }}" target="_blank" class="btn btn-primary">Change Photo</a>
                    </div>
                </div>
                <div class="textbox-group">
                    <label for="name">Name</label>
                    {{--                    <input type="text" value="{{ auth()->user()->name }}" disabled>--}}
                    <div class="textbox">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500">Change on <a href="{{ route('member.settings') }}" target="_blank">Settings Page</a>.</div>
                </div>
                <div class="textbox-group">
                    <label for="email">Email</label>
                    {{--                    <input type="text" value="{{ auth()->user()->email }}">--}}
                    <div class="textbox">{{ auth()->user()->email }}</div>
                    <div class="text-xs text-gray-500">Change on <a href="{{ route('member.settings') }}" target="_blank">Settings Page</a>.</div>
                </div>
                <div class="textbox-group">
                    <label for="birthdate">Birth Date</label>
                    <input type="date" name="birthdate" id="birthdate" value="{{ !empty($candidate->birthday) ? date_format($candidate->birthday, 'Y-m-d') : null }}">
                    @error('birthdate')
                    <span class="text-error">{{ $errors->first('birthdate') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="address">Provinsi</label>
                    <select id="provinsi" onchange="Kota();">
                        <option>Pilih Provinsi</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="address">Kota/Kabupaten</label>
                    <select id="kota_kabupaten" onchange="Kecamatan();">
                        <option>Pilih Kota/Kabupaten</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="address">Kecamatan</label>
                    <select id="kecamatan" onchange="Kelurahan();">
                        <option>Pilih Kecamatan</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="address">Kelurahan</label>
                    <select id="kelurahan">
                        <option>Pilih Kelurahan</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="about">About Me</label>
                    <textarea name="about" id="about" rows="3">{{ !empty($candidate->about) ? $candidate->about : null }}</textarea>
                    @error('about')
                    <span class="text-error">{{ $errors->first('about') }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-center space-x-2">
                <button class="btn btn-primary">Next Step</button>
            </div>
        </form>
    </section>
    <div class="mt-20 md:mt-32 lg:mt-40">
        <img src="{{ asset('assets/member/kandidat/daftar-kandidat.png') }}" alt="Daftar Kandidat" class=" w-[50%]">
    </div>
@endsection
@section('footerJS')
    <script>
        function Provinsi() {
            fetch('http://dev.farizdotid.com/api/daerahindonesia/provinsi').then((response) => {
                return response.json()
            }).then((data) => {
                let html = '<option>Pilih Provinsi</option>';
                for (var i = 0; i < data['provinsi'].length; i++) {
                    html += "<option value=" + data['provinsi'][i].id + ">" + data['provinsi'][i].nama + "</option>"
                }
                document.getElementById("provinsi").innerHTML = html;
            })
        }

        Provinsi();

        function Kota() {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + document.getElementById("provinsi").value).then((response) => {
                return response.json()
            }).then((data) => {
                let html = '<option>Pilih Kota/Kabupaten</option>';
                for (var i = 0; i < data['kota_kabupaten'].length; i++) {
                    html += "<option value=" + data['kota_kabupaten'][i].id + ">" + data['kota_kabupaten'][i].nama + "</option>"
                }
                document.getElementById("kota_kabupaten").innerHTML = html;
            })
        }

        function Kecamatan() {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + document.getElementById("kota_kabupaten").value).then((response) => {
                return response.json()
            }).then((data) => {
                let html = '<option>Pilih Kecamatan</option>';
                for (var i = 0; i < data['kecamatan'].length; i++) {
                    html += "<option value=" + data['kecamatan'][i].id + ">" + data['kecamatan'][i].nama + "</option>"
                }
                document.getElementById("kecamatan").innerHTML = html;
            })
        }

        function Kelurahan() {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + document.getElementById("kecamatan").value).then((response) => {
                return response.json()
            }).then((data) => {
                let html = '<option>Pilih Kelurahan</option>';
                for (var i = 0; i < data['kelurahan'].length; i++) {
                    html += "<option value=" + data['kelurahan'][i].id + ">" + data['kelurahan'][i].nama + "</option>"
                }
                document.getElementById("kelurahan").innerHTML = html;
            })
        }
    </script>
@endsection
