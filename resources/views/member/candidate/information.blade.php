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
                    <div class="textbox">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500">Change on <a href="{{ route('member.settings') }}" target="_blank">Settings Page</a>.</div>
                </div>
                <div class="textbox-group">
                    <label for="email">Email</label>
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
                    <label for="provinsi">Provinsi</label>
                    <select name="address[provinsi]" id="provinsi" onchange="Kota();" onclick="Provinsi();">
                        <option>Pilih Provinsi</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="kota_kabupaten">Kota/Kabupaten</label>
                    <select name="address[kota]" id="kota" onchange="Kecamatan();">
                        <option>Pilih Kota/Kabupaten</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select name="address[kecamatan]" id="kecamatan" onchange="Kelurahan();">
                        <option>Pilih Kecamatan</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="kelurahan">Kelurahan</label>
                    <select name="address[kelurahan]" id="kelurahan">
                        <option>Pilih Kelurahan</option>
                    </select>
                </div>
                <div class="textbox-group">
                    <label for="jalan">Alamat Lengkap (Jalan, No.Rumah, RT & RW)</label>
                    <textarea name="address[jalan]" id="jalan" rows="3">{{ !empty($candidate->address['jalan']) ? $candidate->address['jalan'] : null }}</textarea>
                    @error('address')
                    <span class="text-error">{{ $errors->first('address') }}</span>
                    @enderror
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
    @include('templates.member.location.provinsi')
    @include('templates.member.location.kota')
    @include('templates.member.location.kecamatan')
    @include('templates.member.location.kelurahan')
    <script>
        window.addEventListener("load", (event) => {
            Provinsi({{ !empty($candidate->address['provinsi']) ? $candidate->address['provinsi'] : null }});
            Kota({{ !empty($candidate->address['kota']) ? $candidate->address['kota'] : null }});
            Kecamatan({{ !empty($candidate->address['kecamatan']) ? $candidate->address['kecamatan'] : null }});
            Kelurahan({{ !empty($candidate->address['kelurahan']) ? $candidate->address['kelurahan'] : null }});
        });
    </script>
@endsection
