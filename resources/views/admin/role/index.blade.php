@extends('templates.admin.page')

@section('content')
    @can('create-role')
        <section class="mb-5 text-right">
            <a class="btn btn-primary" href="{{ route('admin.role.create') }}">Add New</a>
        </section>
    @endcan
    <section>
        <div class="table-group">
            <table class="teble-auto">
                <thead>
                <tr>
                    <th class="w-14">ID</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th class="w-28">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    @if($role->id > 1)
                        <tr>
                            <td class="text-center">{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
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
@endsection
