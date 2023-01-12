@extends('templates.auth.page')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="ring ring-areakerja/50 p-10 rounded-xl shadow-lg shadow-areakerja/30" x-data="{ recovery: false }">
            <div class="flex items-center justify-center mb-10">
                <div class="font-bold text-3xl">Two Factor Authentication</div>
            </div>
            <form action="{{ route('two-factor.login') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <div class="textbox-group" x-show="!recovery">
                    <input type="text" name="code" id="code" class="text-center tracking-wide font-mono">
                </div>
                <div class="textbox-group" x-show="recovery">
                    <input type="text" name="recovery_code" id="recovery_code" class="text-center tracking-wide font-mono" placeholder="Recovery Code">
                </div>
                <div class="my-3 text-center">
                    <a class="cursor-pointer" x-show="!recovery" x-on:click="recovery = true;">{{ __('Use a recovery code') }}</a>
                    <a class="cursor-pointer" x-show="recovery" x-on:click="recovery = false;">{{ __('Use an authentication code') }}</a>
                </div>
                <button type="submit" class="btn btn-primary w-full">Confirm</button>
            </form>
        </div>
    </div>
@endsection
