<!DOCTYPE html>
<html lang="en">

@include('templates.candidate.head')

<body class="mitracp">
<div class="flex flex-col lg:flex-row">
    @include('templates.candidate.sidebar')
    <div class="w-full min-h-screen">
        @include('templates.candidate.header')
        @include('templates.candidate.main')
        @include('templates.candidate.footer')
    </div>
</div>
</body>

</html>
