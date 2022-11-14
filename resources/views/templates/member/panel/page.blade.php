<!DOCTYPE html>
<html lang="en">

@include('templates.member.panel.head')

<body class="mitracp">
<div class="flex flex-col lg:flex-row">
    @include('templates.member.panel.sidebar')
    <div class="w-full min-h-screen">
        @include('templates.member.panel.header')
        @include('templates.member.panel.main')
        @include('templates.member.panel.footer')
    </div>
</div>
</body>

</html>
