@extends('templates.public.page')

@section('content')
    @include('templates.member.partner.steps')
    <section>
        <div class="font-bold text-2xl mb-5">Basic Information</div>
        <form action="{{ route('member.daftar.mitra.information.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 space-y-0">
                <div class="space-y-2">
                    <label for="logo">Logo Perusahaan</label>
                    <div class="flex items-center space-x-5">
                        <img class="w-28 rounded-full border-2 border-areakerja/50" src="{{ asset('assets/public/photo').'/'.($partner->user->photo ?? auth()->user()->photo ?? null) }}" alt="" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                        <a href="{{ route('member.settings') }}" target="_blank" class="btn btn-primary">Change Photo</a>
                    </div>
                </div>
                <div class="textbox-group">
                    <label for="email">Email Akun</label>
                    <div class="textbox">{{ $partner->user->email ?? auth()->user()->email ?? null }}</div>
                    <div class="text-xs text-gray-500">Change on <a href="{{ route('member.settings') }}" target="_blank">Settings Page</a>.</div>
                </div>
                <div class="textbox-group">
                    <label for="name">Nama Perusahaan</label>
                    <div class="textbox">{{ $partner->user->name ?? auth()->user()->name ?? null }}</div>
                    <div class="text-xs text-gray-500">Change on <a href="{{ route('member.settings') }}" target="_blank">Settings Page</a>.</div>
                </div>
                <div class="textbox-group">
                    <label for="phone">Phone</label>
                    <div class="flex items-center">
                        <div class="inline-block mr-5 font-semibold">+62</div>
                        <input class="w-full" type="text" name="phone" id="phone" x-data="" x-mask:dynamic="phoneNumber" minlength="11" maxlength="14" value="{{ old('phone') ?? $partner->phone ?? null }}">
                    </div>
                    @error('phone')
                    <span class="text-error">{{ $errors->first('phone') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="email">Email Perusahaan</label>
                    <input type="email" name="email" id="email" value="{{ old('email') ?? $partner->email ?? null }}">
                    @error('email')
                    <span class="text-error">{{ $errors->first('email') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" value="{{ old('website') ?? $partner->website ?? null }}">
                    @error('website')
                    <span class="text-error">{{ $errors->first('website') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="description">Deskripsi Perusahaan</label>
                    <textarea name="description" id="description" rows="1">{{ old('description') ?? $partner->description ?? null }}</textarea>
                    @error('description')
                    <span class="text-error">{{ $errors->first('description') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="address[provinsi]" id="provinsi" onchange="Kota();">
                        <option>Pilih Provinsi</option>
                    </select>
                    @error('address.provinsi')
                    <span class="text-error">{{ $errors->first('address.provinsi') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="kota_kabupaten">Kota/Kabupaten</label>
                    <select name="address[kota]" id="kota" onchange="Kecamatan();">
                        <option>Pilih Kota/Kabupaten</option>
                    </select>
                    @error('address.kota')
                    <span class="text-error">{{ $errors->first('address.kota') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select name="address[kecamatan]" id="kecamatan" onchange="Kelurahan();">
                        <option>Pilih Kecamatan</option>
                    </select>
                    @error('address.kecamatan')
                    <span class="text-error">{{ $errors->first('address.kecamatan') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="kelurahan">Kelurahan</label>
                    <select name="address[kelurahan]" id="kelurahan">
                        <option>Pilih Kelurahan</option>
                    </select>
                    @error('address.kelurahan')
                    <span class="text-error">{{ $errors->first('address.kelurahan') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="jalan">Alamat Lengkap (Jalan, No.Rumah, RT & RW)</label>
                    <textarea name="address[jalan]" id="jalan" rows="1">{{ $partner->address['jalan'] ?? null }}</textarea>
                    @error('address.jalan')
                    <span class="text-error">{{ $errors->first('address.jalan') }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-center space-x-2">
                <button class="btn btn-primary">Next Step</button>
            </div>
        </form>
    </section>
@endsection
@section('footerJS')
    @include('templates.member.location.provinsi')
    @include('templates.member.location.kota')
    @include('templates.member.location.kecamatan')
    @include('templates.member.location.kelurahan')
    <script>
        window.addEventListener("load", (event) => {
            Provinsi({{ $partner->address['provinsi'] ?? null }});
            Kota({{ $partner->address['kota'] ?? null }});
            Kecamatan({{ $partner->address['kecamatan'] ?? null }});
            Kelurahan({{ $partner->address['kelurahan'] ?? null }});
        });
    </script>
    <script>
        function phoneNumber(input) {
            const num = input.split(" ").join("");
            if (num.length == 9) {
                return '999 999 999';
            } else if (num.length == 10) {
                return '999 9999 999';
            } else if (num.length == 11) {
                return '999 9999 9999';
            } else if (num.length == 12) {
                return '999 9999 99999';
            }
        }
    </script>
@endsection
