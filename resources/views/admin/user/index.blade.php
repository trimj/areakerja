@extends('templates.admin.page')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
        @foreach($users as $user)
            @if($user->getRoleNames()->first() != 'Super Admin')
                <div class="card-group">
                    <div class="body flex flex-col items-center justify-center">
                        <img class="w-20 h-20 rounded-full border-2" src="{{ asset('assets/public/photo') . '/' . $user->photo }}" alt="" loading="lazy" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                        <div class="text-center mb-3 mt-5">
                            <div class="font-semibold text-lg">{{ $user->name }}</div>
                            @forelse($user->getRoleNames() as $role)
                                <div class="text-sm">{{ $role }}</div>
                            @empty
                                <div class="text-sm text-gray-500">No Role</div>
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
@endsection
