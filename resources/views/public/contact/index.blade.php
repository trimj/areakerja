@extends('templates.public.page')

@section('headerCSS')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<section class="container m-auto" style="margin-top: 100px; margin-bottom: 200px;">
    <div class="px-6 h-full text-gray-800">
        <div class="flex mx-auto max-w-2xl justify-center items-center h-full g-6 rounded shadow-2xl  flex-col">
            <h1 class="xl:text-5xl lg:text-3xl md:text-3xl sm:text-3xl text-orange-500 font-semibold mt-10">Kontak Kami</h1>
            <h1 class="pt-10 w-full text-left ml-10 text-lg md:text-xl">Apabila ada pertanyaan ataupun saran untuk AreaKerja, silahkan mengisi form di bawah ini:</h1>
            <h1 class="pt-10 w-full text-left ml-10 text-lg md:text-xl pb-10 pr-5 md:pr-0">
                Catatan: Kami tidak menerima pertanyaan terkait ketersediaan lowongan dan sebagainya. Untuk bertanya hal terkait, silahkan hubungi kontak perusahaan yang membuka lowongan kerja tersebut.
            </h1>
            <div class="border-t-2 w-full border-gray-400">
                <form class="w-full" action="">
                    <div class="flex flex-row">
                        <div class="m-5 w-1/2">
                            <label for="text" class=" bg-white px-2 block mb-2 text-xl font-semibold text-gray-900 dark:text-gray-900">Nama</label>
                            <input type="text" name="order" id="order" class="bg-white border-2 border-orange-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-orange-500 dark:placeholder-gray-400 dark:text-white" placeholder="SK2544" required="">
                        </div>
                        <div class="m-5 pt-3 w-1/2">
                            <label for="text" class=" bg-white px-2 block mb-2 text-xl font-semibold text-gray-900 dark:text-gray-900">Email</label>
                            <input type="text" name="order" id="order" class="bg-white border-2 border-orange-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-orange-500 dark:placeholder-gray-400 dark:text-white" placeholder="SK2544" required="">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="m-5 w-1/2">
                            <label for="text" class=" bg-white px-2 block mb-2 text-xl font-semibold text-gray-900 dark:text-gray-900">No Telp / WA</label>
                            <input type="text" name="order" id="order" class="bg-white border-2 border-orange-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-orange-500 dark:placeholder-gray-400 dark:text-white" placeholder="SK2544" required="">
                        </div>
                        <div class="relative m-5 w-1/2">
                        </div>
                    </div>
            </div>
            <div class="border-t-2 w-full border-gray-400">
                <div class="flex flex-row">
                    <div class="m-5 w-full">
                        <label for="text" class=" bg-white px-2 block mb-2 text-xl font-semibold text-gray-900 dark:text-gray-900">Saran</label>
                        <input type="text" name="order" id="order" class="bg-white border-2 border-orange-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-6 dark:bg-white dark:border-orange-500 dark:placeholder-gray-400 dark:text-white" placeholder="SK2544" required="">
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="flex flex-row">
                    <div class="relative m-5 w-full flex mx-auto justify-center items-center">
                        <button class="bg-main rounded-l-lg rounded-r-lg w-200 h-10 px-4 hover:bg-orange-600">
                            <span class="self-center font-semibold whitespace-nowrap dark:text-white">Kirim</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>
    </div>
    </div>
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