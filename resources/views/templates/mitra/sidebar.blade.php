<div class="sidebar">
    <div @click.away="open = false" class="flex flex-col w-full lg:w-64 bg-areakerja" x-data="{ open: false }">
        <div class="px-8 py-4 flex flex-row items-center justify-between">
            <a href="{{ route('mitra.cp') }}" class="lg:mx-auto">
                <img src="{{ asset('assets/admin/logo.svg') }}" alt="Logo" class="w-14 lg:w-32 lg:py-5">
            </a>
            <button class="btn-mobile-menu" @click="open = !open">
                <i class="fas fa-bars fa-fw" x-show="!open"></i>
                <i class="fas fa-bars-staggered fa-fw" x-show="open"></i>
            </button>
        </div>
        <nav>
            <div :class="{'block': open, 'hidden': !open}" class="menu">
                <a class="btn-sidebar @if (Route::is('mitra.cp', 'mitra.dashboard')) active @endif" href="{{ route('mitra.cp') }}"><i class="fas fa-home fa-fw mr-2"></i>Dashboard</a>
                <a class="btn-sidebar @if (Route::is('mitra.lowongan.*')) active @endif" href="{{ route('mitra.lowongan.index') }}"><i class="fas fa-user-check fa-fw mr-2"></i>Lowongan</a>
                <a class="btn-sidebar" href="#"><i class="fas fa-users fa-fw mr-2"></i>Kandidat</a>
                <div class="md:mt-auto mt-2 border-t-2 border-polar4/20 lg:border-0 lg:border-transparent">
                    <div class="flex items-center justify-between cursor-pointer px-5 py-3 hover:bg-polar4/20" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('assets/public/photo') . '/' . auth()->user()->photo }}" alt="" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                        <div class="text-left ml-2">
                            <div class="text-base font-semibold">{{ Str::words(auth()->user()->name, 2, null) }} </div>
                            <div class="text-sm font-normal">{{ auth()->user()->getRoleNames()->first() }}</div>
                        </div>
                        <i class="fas fa-sign-out-alt fa-fw text-xl ml-auto"></i>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
