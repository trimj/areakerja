@extends('templates.member.panel.page')

@section('content')
    <div class="my-10">
        <form action="{{ route('member.settings.updatePhoto') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="textbox-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo">
                @error('photo')
                <span class="text-error">{{ $errors->first('photo') }}</span>
                @enderror
            </div>
            <div class="text-right">
                <button class="btn btn-primary" type="submit">Save Photo</button>
            </div>
        </form>
    </div>
    <div class="my-10">
        <form action="{{ route('user-profile-information.update') }}" method="post">
            @csrf
            @method('put')
            <div class="textbox-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" @error('name') class="error-border" @enderror value="{{ old('name') ?? auth()->user()->name }}">
                @error('name')
                <span class="text-error">{{ $errors->first('name') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" @error('email') class="error-border" @enderror value="{{ old('email') ?? auth()->user()->email }}">
                @error('email')
                <span class="text-error">{{ $errors->first('email') }}</span>
                @enderror
            </div>
            <div class="text-right">
                <button class="btn btn-primary" type="submit">Save Information</button>
            </div>
        </form>
    </div>
    <div class="my-10">
        <form action="{{ route('user-password.update') }}" method="post">
            @csrf
            @method('put')
            <div class="textbox-group">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="current_password" @error('current_password') class="error-border" @enderror>
                @error('current_password')
                <span class="text-error">{{ $errors->first('current_password') }}</span>
                @enderror
            </div>
            <hr>
            <div class="textbox-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" @error('password') class="error-border" @enderror>
                @error('password')
                <span class="text-error">{{ $errors->first('password') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="password_confirmation">New Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" @error('password') class="error-border" @enderror>
                @error('password')
                <span class="text-error">{{ $errors->first('password') }}</span>
                @enderror
            </div>
            <div class="text-right">
                <button class="btn btn-primary" type="submit">Save Password</button>
            </div>
        </form>
    </div>
@endsection
