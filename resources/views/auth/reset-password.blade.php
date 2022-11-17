@extends('templates.auth.page')

@section('content')
    <div class="section-auth">
        <div class="section-img">
            <img src="{{ asset('assets/public/images/auth/forgot-password.svg') }}" alt="Reset Password">
        </div>
        <div class="section-form">
            <div class="flex items-center justify-between mb-16">
                <div class="font-bold text-5xl">Reset Password</div>
                <div class="text-right">Remember your password?<br><a href="{{ route('login') }}">Login Now</a></div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.update') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <div class="textbox-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" value="{{ request()->get('email') }}">
                    @error('email')
                    <span class="text-error">{{ $errors->first('email') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" placeholder="New Password">
                    @error('password')
                    <span class="text-error">{{ $errors->first('password') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="password_confirmation">New Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password">
                    @error('password')
                    <span class="text-error">{{ $errors->first('password') }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-full">Reset Password</button>
            </form>
        </div>
    </div>
@endsection
