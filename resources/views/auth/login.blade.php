@extends('templates.auth.page')

@section('content')
    <div class="section-auth">
        <div class="section-img">
            <img src="{{ asset('assets/public/images/auth/login.svg') }}" alt="Login">
        </div>
        <div class="section-form">
            <div class="flex items-center justify-between mb-16">
                <div class="font-bold text-5xl">Login</div>
                <div class="text-right">Don't have an account?<br><a href="{{ route('register') }}">Register Now</a></div>
            </div>
            <form action="{{ route('login') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <div class="textbox-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="textbox-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="flex items-center justify-between">
                    <div class="checkbox-group">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}">Forgot Password</a>
                </div>
                <button type="submit" class="btn btn-primary w-full">Login</button>
            </form>
        </div>
    </div>
@endsection
