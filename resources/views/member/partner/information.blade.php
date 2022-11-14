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
                    <label for="logo">Logo</label>
                    <div class="flex items-center space-x-2">
                        @if(!empty($partner->logo))
                            <img class="w-28 rounded-full border-2 border-areakerja/50" src="{{ asset('assets/mitra/logo').'/'.$partner->logo }}" alt="Logo Partner" onerror="this.src({{ asset('assets/public/avatar/default_avatar.png') }});">
                        @endif
                        <div class="textbox-group w-full">
                            <input type="file" name="logo" id="logo">
                            @error('logo')
                            <span class="text-error">{{ $errors->first('logo') }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="textbox-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}">
                </div>
                <div class="textbox-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="textbox-group">
                    <label for="phone">Phone</label>
                    <div class="flex items-center">
                        <div class="inline-block mr-5 font-semibold">+62</div>
                        <input class="w-full" type="text" name="phone" id="phone" x-data="" x-mask:dynamic="phoneNumber" minlength="11" maxlength="14">
                    </div>
                </div>
                <div class="textbox-group">
                    <label for="email">Website</label>
                    <input type="text" name="website" id="website">
                </div>
                {{--                <div class="hidden md:block"></div>--}}
                <div class="textbox-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="1"></textarea>
                </div>
                <div class="col-span-2 space-y-5">
                    <div class="textbox-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address">
                    </div>
                    <div class="flex flex-col lg:flex-row items-center space-y-5 lg:space-y-0 space-x-0 lg:space-x-5">
                        <div class="textbox-group w-full">
                            <label for="province">Province</label>
                            <select name="province" id="province">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="textbox-group w-full">
                            <label for="city">City</label>
                            <select name="city" id="city">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row items-center space-y-5 lg:space-y-0 space-x-0 lg:space-x-5">
                        <div class="textbox-group w-full">
                            <label for="district">District</label>
                            <select name="district" id="district">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="textbox-group w-full">
                            <label for="village">Village</label>
                            <select name="village" id="village">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="textbox-group">
                        <label for="zipcode">Zip Code</label>
                        <input type="number" name="zipcode" id="zipcode">
                    </div>
                </div>
            </div>
            <div class="text-center space-x-2">
                <button class="btn btn-primary">Next Step</button>
            </div>
        </form>
    </section>
@endsection
@section('footerJS')
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
