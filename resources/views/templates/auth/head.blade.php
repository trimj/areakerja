<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ (!empty($page_title) ? $page_title . ' - ' : null) . config('app.name', 'Area Kerja') }}</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    {{-- JS --}}
    <script src="{{ asset('js/global.js') }}" defer></script>
</head>
