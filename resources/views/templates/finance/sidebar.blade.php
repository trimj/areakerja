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
                    class="flex items-center p-2 text-tertiary-text transition-colors rounded-md hover:text-white hover:bg-tertiary-active"
                    :class="{'bg-tertiary-active': isActive || open}" role="button" aria-haspopup="true"
                    :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <i class="fa-solid fa-file-invoice"></i>
                    </span>
                    <span class="ml-3 text-sm"> Invoice </span>
                </a>
            </div>

            <div x-data="{ isActive: {{Route::is('finance.edit-harga') ? 'true' : 'false'}}, open: {{Route::is('finance.edit-harga') ? 'true' : 'false'}}}">
                <a href="{{route('finance.edit-harga')}}"
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
            <div class="flex flex-row items-center justify-center">
                <img src="{{asset('assets/finance/dummy.svg')}}" alt="" class="rounded-full w-11 mr-4">
                <i class="fa-solid fa-arrow-right-from-bracket text-3xl text-tertiary-text"></i>
            </div>
            <button @click="openSettingsPanel" type="button"
                class="flex items-center justify-center w-full px-4 py-2 text-sm text-tertiary-text rounded-md bg-primary hover:bg-white focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white">
                <span aria-hidden="true">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </span>
                <span>Customize</span>
            </button>
        </div>
    </div>
</aside>