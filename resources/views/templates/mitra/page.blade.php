<!DOCTYPE html>
<html lang="en">

@include('templates.mitra.head')

<body class="mitracp">
<div class="flex flex-col lg:flex-row">
    @include('templates.mitra.sidebar')
    <div class="w-full min-h-screen">
        @include('templates.mitra.header')
        @include('templates.mitra.main')
        @include('templates.mitra.footer')
    </div>
</div>
</body>

</html>
