@extends('templates.admin.page')

@section('content')
    <section>
        <div class="flex items-center mb-5">
            <form action="{{ route('admin.user.index') }}" method="get" class="flex space-y-0 space-x-2">
                <div class="textbox-group">
                    <input type="text" name="q" id="q" placeholder="Kotak Pencarian" value="{{ request()->get('q') }}">
                </div>
                <div class="flex items-center justify-center space-x-2 space-y-0">
                    <div class="textbox-group">
                        <select name="sort" id="sort">
                            <option value="id" @if(request()->sort == 'id') selected @endif>ID</option>
                            <option value="name" @if(request()->sort == 'name') selected @endif>Name</option>
                            <option value="email" @if(request()->sort == 'email') selected @endif>Email</option>
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
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach($users as $user)
                @if($user->getRoleNames()->first() != 'Super Admin')
                    <div class="card-group">
                        <div class="body flex flex-col items-center justify-center">
                            <img class="w-20 h-20 rounded-full border-2" src="{{ asset('assets/public/photo') . '/' . $user->photo }}" alt="{{ Str::slug($user->name) }}" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                            <div class="text-center mb-3 mt-5">
                                <div class="font-semibold text-lg">{{ $user->name }}</div>
                                @forelse($user->getRoleNames() as $role)
                                    <div class="text-sm">{{ $role }}</div>
                                @empty
                                    <div class="text-sm text-gray-400">No Role</div>
                                @endforelse
                            </div>
                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                        </div>
                        <div class="footer">
                            <div class="information justify-center space-x-2">
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-small btn-secondary"><i class="fas fa-edit"></i><span class="ml-2">Edit</span></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <section>
        <div class="text-center">{{ $users->links() }}</div>
    </section>
@endsection
