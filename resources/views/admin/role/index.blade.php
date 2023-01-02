@extends('templates.admin.page')

@section('content')
    <section>
        <div class="flex justify-between items-center mb-5">
            <form action="{{ route('admin.role.index') }}" method="get" class="flex space-y-0 space-x-2">
                <div class="textbox-group">
                    <input type="text" name="q" id="q" placeholder="Kotak Pencarian" value="{{ request()->get('q') }}">
                </div>
                <div class="flex items-center justify-center space-x-2 space-y-0">
                    <div class="textbox-group">
                        <select name="sort" id="sort">
                            <option value="id" @if(request()->sort == 'id') selected @endif>ID</option>
                            <option value="name" @if(request()->sort == 'name') selected @endif>Name</option>
                            <option value="protect" @if(request()->sort == 'protect') selected @endif>Guard</option>
                        </select>
                    </div>
                    <div class="textbox-group">
                        <select name="order" id="order">
                            <option value="asc" @if(request()->order == 'asc') selected @endif>Ascending</option>
                            <option value="desc" @if(request()->order == 'desc') selected @endif>Descending</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </div>
            </form>
            @can('create-role')
                <div>
                    <a class="btn btn-primary" href="{{ route('admin.role.create') }}">Add New</a>
                </div>
            @endcan
        </div>
        <div class="table-group">
            <table class="teble-auto">
                <thead>
                <tr>
                    <th class="w-14">ID</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Background</th>
                    <th>Color</th>
                    <th>Border</th>
                    <th class="w-28">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    @if($role->id > 1)
                        <tr>
                            <td class="text-center">{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">{{ $role->guard_name }}</td>
                            <td class="text-center">{{ $role->bgColor }}</td>
                            <td class="text-center">{{ $role->textColor }}</td>
                            <td class="text-center">{{ $role->borderColor }}</td>
                            <td class="flex items-center justify-center space-x-2">
                                @can('edit-role')
                                    <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-small btn-secondary"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('delete-role')
                                    <form action="{{ route('admin.role.destroy', $role->id) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div class="text-center">{{ $roles->links() }}</div>
    </section>
@endsection
