@extends('templates.auth.page')

@section('content')
    <div class="section-auth">
        <div class="section-img flex justify-center items-center mx-auto">
            <img src="{{ asset('assets/public/images/auth/verifikasi-email.svg') }}" alt="Email Verification">
        </div>
        <div class="section-form">
            <div class="flex items-center justify-between mb-16">
                <div class="font-bold text-5xl">Email Verification</div>
                <div class="text-right">Don't have an account?<br><a href="{{ route('register') }}">Register Now</a></div>
            </div>
            <form action="{{ route('login') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <div class="textbox-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') ?? auth()->user()->email }}">
                </div>
                <button class="btn btn-primary w-full">Send Verification</button>
            </form>
        </div>
    </div>
@endsection
