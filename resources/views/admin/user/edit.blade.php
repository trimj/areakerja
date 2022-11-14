@extends('templates.admin.page')

@section('content')
    <div class="my-10">
        <form action="{{ route('admin.user.update.photo', $user->id) }}" method="post" enctype="multipart/form-data">
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
        <form action="{{ route('admin.user.update.information', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}">
            </div>
            <div class="textbox-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save Information</button>
            </div>
        </form>
    </div>
    @can('edit-user-role')
        <form action="{{ route('admin.user.update.role', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="textbox-group">
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option value="{{ $user->getRoleNames()->first() }}" selected disabled>{{ $user->getRoleNames()->first() }}</option>
                    <optgroup>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Change Role</button>
            </div>
        </form>
    @endcan
@endsection
