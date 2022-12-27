<div class="p-4 bg-white border-b flex items-center justify-between p-4">
    <div class="font-semibold">{{ (!empty($page_title) ? $page_title : null) }}</div>
    <div class="flex items-center space-x-2">
        <div class="text-xl cursor-pointer hover:text-areakerja"><i class="far fa-bell fa-fw"></i></div>
        <div @click.away="open = false" class="relative z-20" x-data="{ open: false }">
            <button @click="open = !open" class="btn-dropdown text-sm">
                <img class="h-6 w-6 rounded-full border" src="{{ asset('assets/public/photo') . '/' . auth()->user()->photo }}" alt="" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                <div class="hidden lg:block">{{ Str::words(auth()->user()->name, 2, null) }} </div>
            </button>
            <div x-show="open" class="dropdown w-44 lg:w-full"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95">
                <div class="px-2 py-2 bg-white rounded-md shadow">
                    @can('access-usercp')
                        <a href="{{ route('member.cp') }}" class="block btn-navbar">User Panel</a>
                    @endcan
                    @can('access-kandidatcp')
                        <a href="{{ route('kandidat.cp') }}" class="block btn-navbar">Kandidat Panel</a>
                    @endcan
                    @can('access-mitracp')
                        <a href="{{ route('mitra.cp') }}" class="block btn-navbar">Mitra Panel</a>
                    @endcan
                    @can('access-admincp')
                        <a href="{{ route('admin.cp') }}" class="block btn-navbar">Admin Panel</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
