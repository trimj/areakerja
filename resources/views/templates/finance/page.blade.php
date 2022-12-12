<!DOCTYPE html>
<html lang="en">

@include('templates.finance.head')

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100">
            <!-- Loading screen -->
            <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
                Loading.....
            </div>
            @include('templates.finance.sidebar')
            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
                @include('templates.finance.main')
                @include('templates.finance.footer')
            </div>
        </div>
    </div>
    @hasSection('footerJS')
        @yield('footerJS')
    @endif
</body>

</html>