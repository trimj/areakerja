<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ (!empty($page_title) ? $page_title . ' - ' : null) . config('app.name', 'Area Kerja') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    {{-- CSS --}}
    @hasSection('headerCSS')
        @yield('headerCSS')
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    {{-- JS --}}
    @hasSection('headerJS')
        @yield('headerJS')
    @endif
</head>