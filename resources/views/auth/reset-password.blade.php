@extends('templates.auth.page')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.update') }}" method="post" class="max-w-md mx-auto">
        @csrf
        <input type="hidden" name="token" value="{{ request()->get('token') }}">
        <div class="textbox-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" value="">
        </div>
        <div class="textbox-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="New Password">
        </div>
        <div class="textbox-group">
            <label for="password">Password Confirmation</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
        </div>
        <button type="submit">Reset Password</button>
    </form>
@endsection
