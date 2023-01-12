<!DOCTYPE html>
<html lang="en">

@include('templates.auth.head')

<body class="auth">
@hasSection('content')
    @yield('content')
@endif
@include('sweetalert::alert')
</body>

</html>
