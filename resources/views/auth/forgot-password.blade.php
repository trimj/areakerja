@extends('templates.auth.page')

@section('content')
    <div class="section-auth">
        <div class="section-img">
            <img src="{{ asset('assets/public/images/auth/forgot-password.svg') }}" alt="Forgot Password">
        </div>
        <div class="section-form">
            <div class="flex justify-between mb-16 space-y-3">
                <div class="basis-1/2">
                    <div class="font-bold text-5xl">Forgot Password</div>
                </div>
                <div class="basis-1/2 text-right">Remember your password?<br><a href="{{ route('login') }}">Login Now</a></div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <div class="textbox-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Registered Email">
                </div>
                <button type="submit" class="btn btn-primary w-full">Send Reset Password Link</button>
            </form>
        </div>
    </div>
@endsection
