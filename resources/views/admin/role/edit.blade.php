@extends('templates.admin.page')

@section('content')
    <section>
        <form action="{{ route('admin.role.update', $role->id) }}" method="post">
            @csrf
            @method('put')
            <div class="textbox-group">
                <label for="roleName">Role Name</label>
                <input type="text" name="roleName" id="roleName" @error('roleName') class="textbox-error" @enderror value="{{ old('roleName') ?? $role->name }}">
                @error('roleName')
                <span class="text-error">{{ $errors->first('roleName') }}</span>
                @enderror
            </div>
            <div>
                <label for="roleGuard">Role Guard</label>
                <select name="roleGuard" id="roleGuard" @error('roleName') class="input-error" @enderror>
                    <option value="{{ $role->guard_name }}" selected disabled>{{ Str::headline($role->guard_name) }}</option>
                    <optgroup>
                        <option value="web">Web</option>
                        <option value="api">API</option>
                    </optgroup>
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
    <section class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @can('sync-role-permission')
            <div>
                <form action="{{ route('admin.role.permission.sync', $role->id) }}" method="post">
                    @csrf
                    <div class="textbox-group">
                        <label for="syncPermissions">Permissions</label>
                        <select name="syncPermissions[]" id="syncPermissions" multiple size="7">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission }}" @if(in_array($permission, $rolePermissions)) selected @endif>{{ Str::headline($permission) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary">Update Permissions</button>
                    </div>
                </form>
            </div>
        @endcan
    </section>
@endsection
