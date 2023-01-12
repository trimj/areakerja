@extends('templates.member.panel.page')

@section('content')
    <section>
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
    </section>
    <hr>
    <section>
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
    </section>
@endsection
