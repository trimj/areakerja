@extends('templates.public.page')

@section('headerCSS')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<section class="container m-auto" style="margin-top: 100px; margin-bottom: 200px;">
    <main class="container mx-auto">
        <div class="flex flex-row">
            <div class="w-1/2 flex-row hidden lg:flex">
                <div class="flex flex-col justify-end">
                    <img class="w-64 rounded-xl ml-auto m-4" src="/src/img/tentangkami1.svg" alt="">
                    <img class="w-64 rounded-xl ml-auto mx-4" src="/src/img/tentangkami3.svg" alt="">
                </div>
                <div class="flex items-center">
                    <img class="w-64 rounded-xl" src="/src/img/tentangkami2.svg" alt="">
                </div>
            </div>
            <div class="lg:w-1/2 text-center lg:text-right flex flex-col items-center lg:items-end justify-center p-5">
                <h1 class="text-3xl font-bold">Tentang Kami</h1>
                <p class="lg:max-w-sm">Areakerja adalah perusahaan berbasis teknologi informasi yang berpusat di Yogyakarta. Perusahaan ini berfokus pada platform untuk mencari lowongan kerja di Daerah Istimewa Yogyakarta (DIY).
                </p>
            </div>
        </div>

        <div class="flex flex-col relative pb-10">
            <img src="/src/img/logo.png" alt="" class="absolute opacity-30 w-479px right-0 -top-40">
            <div>
                <div class="flex flex-col text-center">
                    <div class="w-3/4 mx-auto">
                        <h1 class="text-4xl">yogyakarta</h1>
                        <p>DIY sebagai salah satu wilayah prestisius di Indonesia yang menyandang sebagai kota budaya dan pelajar 
                            membuat arus ekonomi dan bisnis di wilayah ini cukup besar. Banyak sekali perusahaan besar, menengah, 
                            dan kecil yang berdiri di wilayah DIY dan terus mengembangkan bisnisnya. 
                            Hal ini menuntut banyak dibukanya lowongan pekerjaan di DIY.
                        </p>
                    </div>
                    <div class="flex flex-row text-left w-11/12 mx-auto">
                        <div class="flex flex-col w-1/2 mr-16">
                            <img class="w-32" src="/src/img/tentangkami4.svg" alt="">
                            <h3 class="font-bold text-xl">Arus Lowongan</h3>
                            <p class="text-gray-500">Banyaknya arus lowongan pekerjaan di Yogyakarta baik dari perusahaan besar, menengah, dan kecil menuntut diperlukannya sebuah media yang berfokus untuk menampung informasi lowongan pekerjaan yang ada di Yogyakarta.</p>
                        </div>
                        <div class="flex flex-col w-1/2 ml-mr-16">
                            <img class="w-32" src="/src/img/tentangkami5.svg" alt="">
                            <h3 class="font-bold text-xl">Arus Kerja</h3>
                            <p class="text-gray-500">Untuk itu Areakerja hadir sebagai platform untuk membantu perusahaan mendapatkan kandidat terbaiknya, serta membantu para pencari kerja untuk menemukan pekerjaan yang diinginkan di DIY.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

@endsection

@section('footerJS')
<script>
    function Provinsi(divId, id) {
        fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + id).then((response) => {
            return response.json();
        }).then((data) => {
            document.getElementById(divId).innerHTML = data.nama;
        });
    }
</script>
@endsection