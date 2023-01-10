<header class="sticky">
    <div class="header" x-data="{ open: false }">
        <div class="py-4 flex flex-row items-center justify-between">
            <a href="{{ route('public.home') }}" class="w-14">
                <img src="{{ asset('assets/public/images/logo.png') }}" alt="{{ 'Logo' . config('app.name', 'Area Kerja') }}">
            </a>
            <button class="btn-mobile-menu" @click="open = !open">
                <i class="fas fa-bars fa-fw" x-show="!open"></i>
                <i class="fas fa-bars-staggered fa-fw" x-show="open"></i>
            </button>
        </div>
        <nav class="navbar">
            <div :class="{ 'flex': open, 'hidden': !open }" class="menu">
                <a class="btn-navbar @if (Route::is('public.home')) active @endif" href="{{ route('public.home') }}">Beranda</a>
                <a class="btn-navbar @if (Route::is('public.article.*')) active @endif" href="{{ route('public.article.index') }}">Tips Kerja</a>
                <a class="btn-navbar @if (Route::is('public.lowongan.*')) active @endif" href="{{ route('public.lowongan.index') }}">Lowongan</a>
                <a class="btn-navbar @if (Route::is('public.mitra.*')) active @endif" href="{{ route('public.mitra.index') }}">Mitra</a>
                <div @click.away="open = false" class="relative z-20" x-data="{ open: false }">
                    <button @click="open = !open" class="btn-navbar btn-dropdown">
                        <div>More</div>
                        <i :class="{ 'fa-rotate-180': open }" class="fas fa-chevron-down fa-fw"></i>
                    </button>
                    <div x-show="open" class="dropdown"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95">
                        <div class="px-2 py-2 bg-white rounded-md shadow">
                            <a class="block btn-navbar" href="#">About</a>
                            <a class="block btn-navbar" href="{{ route('public.contact') }}">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
            <div :class="{ 'flex': open, 'hidden': !open }" class="auth-section">
                @auth
                    @can('daftar-kandidat')
                        <a href="{{ route('member.daftar.kandidat.index') }}" class="btn btn-tertiary text-sm font-semibold flex items-center"><i class="fas fa-user-tie fa-fw"></i>
                            <div class="block md:hidden xl:block ml-2 md:ml-0 xl:ml-2">Daftar Kandidat</div>
                        </a>
                    @endcan
                    @can('daftar-mitra')
                        <a href="{{ route('member.daftar.mitra.index') }}" class="btn btn-tertiary text-sm font-semibold flex items-center"><i class="fas fa-handshake fa-fw"></i>
                            <div class="block md:hidden xl:block ml-2 md:ml-0 xl:ml-2">Daftar Mitra</div>
                        </a>
                    @endcan
                    <div class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false">
                        <button type="button" class="btn btn-primary flex space-x-2 items-center w-full text-sm font-semibold" @click="open = !open" x-bind:aria-expanded="open" aria-expanded="true">
                            <img class="h-4 w-4 lg:h-6 lg:w-6 rounded-full" src="{{ asset('assets/public/photo') . '/' . auth()->user()->photo }}" alt="" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                            <div class="block md:hidden lg:block">{{ Str::words(auth()->user()->name, 2, null) }} </div>
                        </button>
                        <div x-show="open" class="user-dropdown"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95">
                            <div class="divide-y divide-gray-50 whitespace-nowrap w-full">
                                @can('access-usercp')
                                    <a href="{{ route('member.cp') }}" class="btn-dropdown">User Panel</a>
                                @endcan
                                @if(auth()->user()->hasRole([4]))
                                    @can('access-mitracp')
                                        <a href="{{ route('mitra.cp') }}" class="btn-dropdown">Mitra Panel</a>
                                    @endcan
                                @endif
                                @if(auth()->user()->hasRole([5]))
                                    @can('access-kandidatcp')
                                        <a href="{{ route('kandidat.cp') }}" class="btn-dropdown">Kandidat Panel</a>
                                    @endcan
                                @endif
                                @if(auth()->user()->hasAnyRole([1,2]))
                                    @can('access-admincp')
                                        <a href="{{ route('admin.cp') }}" class="btn-dropdown">Admin Panel</a>
                                    @endcan
                                @endif
                                @if(auth()->user()->hasRole([3]))
                                    @can('access-financecp')
                                        <a href="{{ route('finance') }}" class="btn-dropdown">Finance</a>
                                    @endcan
                                @endif
                                <a href="#logout" class="btn-dropdown" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-tertiary mt-2 md:mt-0">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary mt-2 md:mt-0">Sign Up</a>
                @endauth
            </div>
        </nav>
    </div>
</header>
