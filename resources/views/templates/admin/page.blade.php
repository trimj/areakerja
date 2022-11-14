<!DOCTYPE html>
<html lang="en">

@include('templates.admin.head')

<body class="admincp">
<div class="flex flex-col lg:flex-row">
    @include('templates.admin.sidebar')
    <div class="w-full min-h-screen">
        @include('templates.admin.header')
        @include('templates.admin.main')
        @include('templates.admin.footer')
    </div>
</div>
</body>

</html>
