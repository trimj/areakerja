<!-- Main content -->
<main class="min-h-screen">
    @hasSection('content')
        @yield('content')
    @endif
    @auth
    <form action="{{ route('logout') }}" method="post" id="logout-form" class="hidden">
        @csrf
    </form>   
    @endauth
    @include('sweetalert::alert')
</main>
@hasSection('footerJS')
    @yield('footerJS')
@endif