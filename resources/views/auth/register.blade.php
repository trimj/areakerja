@extends('templates.auth.page')

@section('content')
    <div class="section-auth">
        <div class="section-img flex justify-center items-center mx-auto">
            <img src="{{ asset('assets/public/images/auth/register.svg') }}" alt="Register">
        </div>
        <div class="section-form">
            <div class="flex items-center justify-between mb-16">
                <div class="font-bold text-5xl">Register</div>
                <div class="text-right">Already have an account?<br><a href="{{ route('login') }}">Login Now</a></div>
            </div>
            <form action="{{ route('register') }}" method="post" class="max-w-md mx-auto">
                @csrf
                <div class="textbox-group">
                    <label for="email">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" @error('name') class="error-border" @enderror value="{{ old('name') }}">
                    @error('name')
                    <span class="text-error">{{ $errors->first('name') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" @error('email') class="error-border" @enderror value="{{ old('email') }}">
                    @error('email')
                    <span class="text-error">{{ $errors->first('email') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" @error('password') class="error-border" @enderror value="{{ old('password') }}">
                    @error('password')
                    <span class="text-error">{{ $errors->first('password') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" @error('password') class="error-border" @enderror value="{{ old('password') }}">
                    @error('password')
                    <span class="text-error">{{ $errors->first('password') }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-full">Register</button>
            </form>
        </div>
    </div>
@endsection
