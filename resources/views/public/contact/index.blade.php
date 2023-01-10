@extends('templates.public.page')

@section('headerCSS')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<section class="container m-auto min-h-screen mt-3 md:mt-20 mb-40">
    <div class="bg-orange-200 relative w-full h-screen md:h-52 top-32 flex flex-col md:flex-row">
        <div class="w-full md:w-1/2">
        </div>
        <div class="w-full md:w-1/2 ml-16 text-center md:text-right">
            <h1 class="text-xl font-bold md:mt-10 md:mr-96">Contact</h1>
            <h1 class="text-sm font-bold md:mt-10 md:mr-96">Contact us if you have any questions about our company or products. We will try to provide an answer within a few days.</h1>
        </div>
    </div>
    <div class="flex w-64 md:w-96 justify-center items-center h-auto p-10 g-6 flex-col absolute bg-white -mt-26.4rem md:-mt-44 ml-12 mr-10 md:mr-0 md:ml-60 border-2 sm:ml-48 border-main rounded-xl">
        <div class="relative mb-10">
            <input type="text" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 w-60 text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-900 appearance-none dark:text-gray-900 dark:border-gray-200 dark:focus:border-main focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Name</label>
        </div>
        <div class="relative mb-10">
            <input type="text" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 w-60 text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-900 appearance-none dark:text-gray-900 dark:border-gray-200 dark:focus:border-main focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
        </div>
        <div class="relative mb-10">
            <input type="text" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 w-60 text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-900 appearance-none dark:text-gray-900 dark:border-gray-200 dark:focus:border-main focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Company Name</label>
        </div>
        <div class="relative mb-10">
            <input type="text" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 h-20 w-60 text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-900 appearance-none dark:text-gray-900 dark:border-gray-200 dark:focus:border-main focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Message</label>
        </div>
            <button class="bg-main w-full rounded-xl p-1 text-white hover:bg-orange-500">Submit</button>
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