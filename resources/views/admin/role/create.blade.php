@extends('templates.admin.page')

@section('content')
<section>
    <form action="{{ route('admin.role.store') }}" method="post">
        @csrf
        <div class="textbox-group">
            <label for="roleName">Role Name</label>
            <input type="text" name="roleName" id="roleName" @error('roleName') class="textbox-error" @enderror value="{{ old('roleName') }}">
            @error('roleName')
            <span class="text-error">{{ $errors->first('roleName') }}</span>
            @enderror
        </div>
        <div>
            <label for="roleGuard">Role Guard</label>
            <select name="roleGuard" id="roleGuard" @error('roleName') class="input-error" @enderror>
                <option value="web">Web</option>
                <option value="api">API</option>
            </select>
            @error('roleGuard')
            <span class="text-error">{{ $errors->first('roleGuard') }}</span>
            @enderror
        </div>
        <div class="text-right">
            <button class="btn btn-primary">Create Role</button>
        </div>
    </form>
</section>
@endsection
