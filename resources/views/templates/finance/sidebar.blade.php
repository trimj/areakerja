<!-- Sidebar -->
<aside class="flex-shrink-0 hidden w-64 bg-white md:block">
    <div class="flex flex-col h-full bg-tertiary">
        <img class="mx-auto w-30% pt-14 pb-10" src="{{asset('assets/public/images/logo.png')}}" alt="">
        <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
            <div x-data="{ isActive: {{Route::is('finance') ? 'true' : 'false'}}, open: {{Route::is('finance') ? 'true' : 'false'}}}">
                <a href="{{route('finance')}}"
                    class="flex items-center p-2 text-tertiary-text transition-colors rounded-md hover:text-white hover:bg-tertiary-active"
                    :class="{'bg-tertiary-active': isActive || open}" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Dashboards </span>
                </a>
            </div>

            <div x-data="{ isActive: {{Route::is('finance.invoice') ? 'true' : 'false'}}, open: {{Route::is('finance.invoice') ? 'true' : 'false'}}}">
                <a href="{{route('finance.invoice')}}"
                    class="flex items-center p-2 pl-3 text-tertiary-text transition-colors rounded-md hover:text-white hover:bg-tertiary-active"
                    :class="{'bg-tertiary-active': isActive || open}" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <i class="fa-solid fa-file-invoice"></i>
                    </span>
                    <span class="ml-3 text-sm"> Invoice </span>
                </a>
            </div>

            <div x-data="{ isActive: {{Route::is('finance.edit-harga.index') ? 'true' : 'false'}}, open: {{Route::is('finance.edit-harga.index') ? 'true' : 'false'}}}">
                <a href="{{route('finance.edit-harga.index')}}"
                    class="flex items-center p-2 text-tertiary-text transition-colors rounded-md hover:text-white hover:bg-tertiary-active"
                    :class="{'bg-tertiary-active': isActive || open}" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <i class="fa-solid fa-eraser"></i>
                    </span>
                    <span class="ml-3 text-sm"> Edit Harga </span>
                </a>
            </div>
        </nav>

        <!-- Sidebar footer -->
        <div class="flex-shrink-0 px-2 py-4 space-y-2">
            <div class="md:mt-auto mt-2 border-t-2 border-polar4/20 lg:border-0 lg:border-transparent">
                <div class="flex items-center justify-between cursor-pointer px-5 py-3 hover:bg-polar4/20 text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img class="h-10 w-10 rounded-full" src="{{ asset('assets/public/photo') . '/' . auth()->user()->photo }}" alt="" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}'">
                    <div class="text-left ml-2">
                        <div class="text-base text-white font-semibold">{{ Str::words(auth()->user()->name, 3, null) }} </div>
                        <div class="text-sm text-white font-normal">{{ auth()->user()->getRoleNames()->first() }}</div>
                    </div>
                    <i class="fas fa-sign-out-alt fa-fw text-xl ml-auto"></i>
                </div>
            </div>
        </div>
    </div>
</aside>