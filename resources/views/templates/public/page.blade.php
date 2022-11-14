<!DOCTYPE html>
<html lang="en">

@include('templates.public.head')

<body>
    @include('templates.public.header')
    @include('templates.public.main')
    @include('templates.public.footer')
    @hasSection('footerJS')
        @yield('footerJS')
    @endif
</body>

</html>
