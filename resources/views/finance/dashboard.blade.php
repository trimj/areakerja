@extends('templates.finance.page')

@section('headerCSS')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6-darker">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
    </div>
    <div class="flex flex-col lg:flex-row ml-4 gap-4 mt-4">
        <div class="flex flex-col w-full">
            <div class="flex flex-row ">
                <div class="items-center justify-between bg-white w-full rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4 bg-main" style="height: 120px;">
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full">
                                <p class="text-2xl text-white font-bold"> Welcome Back !</p>
                                <p class="text-white">Rose !</p>
                            </div>
                            <div class="flex flex-col w-48 ml-10 mt-5">
                                <img src="{{ asset('assets/finance/profile-cover.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="rounded-full items-center justify-between lg:-mt-9 ml-7 w-20 h-20">
                        <img src="{{ asset('assets/finance/dummy.svg') }}" alt="">
                    </div>
                    <div class="flex flex-row w-full p-4 gap-2" style="background: white">
                        <div class="flex flex-col w-full">
                            <span class="text-lg">Rose Park</span>
                            <span class="text-sm">Admin</span>
                        </div>
                        <div class="flex flex-col w-full">
                            <div class=" flex flex-row gap-2 ml-auto">
                                <button class="rounded-full items-center bg-main mt-4 w-28 h-8" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
        <div class="flex flex-col w-full justify-center">
            <div class="flex flex-col lg:flex-row align-middle relative w-auto gap-4">

                <div class="w-full relative">
                    <div class="flex items-center justify-between p-4 py-8 bg-white rounded-xl shadow-lg">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase-light">
                                Jumlah Saldo Saat ini
                            </h6>
                            <span class="text-xl font-semibold">Rp. {{ $saldo['jumlah'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="w-full relative">
                    <div class="flex items-center justify-between p-4 py-8 bg-white rounded-xl shadow-lg">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase-light">
                                Rata - Rata Pendapatan
                            </h6>
                            <span class="text-xl font-semibold">Rp. {{ $saldo['mean'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- endcard -->
    </div>

    <div class="ml-4 mb-4">
        <!-- chard -->
        <div class=" w-full relative mt-4">
            <div class="bg-white w-full" x-data="{ isOn: false }">
                <div class="flex items-center justify-between p-4 border-b">
                    <h4 class="text-lg font-semibold text-gray-500">
                        Jumlah Uang
                    </h4>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Last year</span>
                        <button class="relative focus:outline-none" x-cloak
                            @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                            <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100">
                            </div>
                            <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                :class="{ 'translate-x-0  bg-white': !isOn, 'translate-x-6 bg-primary-light': isOn }">
                            </div>
                        </button>
                    </div>
                </div>
                <div class="relative p-4 h-80">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <!-- endchard -->
    </div>

    <div class="flex flex-row w-96 sm:w-auto ml-4 bg-white">
        <div class="container mx-auto py-6 px-4" x-cloak>
            <div class="mb-4 flex justify-between items-center">
                <div class="flex flex-row">
                    <p class="text-xl">Riwayat Transaksi Terakhir</p>
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="riwayat-transaksi" style="width:100%;">
                        <thead>
                            <tr>
                                <th>
                                    <p class="text-center">ID Order</p>
                                </th>
                                <th>
                                    <p class="text-center">Nama</p>
                                </th>
                                <th>
                                    <p class="text-center">Tanggal</p>
                                </th>
                                <th>
                                    <p class="text-center">Total</p>
                                </th>
                                <th>
                                    <p class="text-center">Payment Status</p>
                                </th>
                                <th>
                                    <p class="text-center">Aksi</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $value->id }}</td>
                                    <td class="text-center">{{ $value->partner->user->name }}</td>
                                    <td class="text-center">{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                                    <td class="text-center">RP. {{ $value->amount }}</td>
                                    <td class="text-center">{{ $value->payment_status }}</td>
                                    <td class="text-center">
                                        <button
                                            class="py-2 px-8 text-sm text-white bg-main hover:bg-orange-500 rounded-full"
                                            data-modal-toggle="{{ 'viewDetailModal' . $key }}">View Detail</button>
                                        <div id="{{ 'viewDetailModal' . $key }}" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full pt-40 pb-10 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow ">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-start justify-between p-4 rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl m-auto font-semibold text-gray-900">
                                                            Riwayat Transaksi
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-0 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="{{ 'viewDetailModal' . $key }}">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-6">
                                                        <div class="flex flex-row">
                                                            <div class="text-center w-full">
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">ID
                                                                    Transaksi</label>
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{ $value->id }}</label>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-row">
                                                            <div class="w-1/2">
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">Tanggal
                                                                    Transaksi</label>
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{ date('d F Y', strtotime($value->created_at)) }}</label>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">Status
                                                                    Pembayaran</label>
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{ $value->payment_status }}</label>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-row">
                                                            <div class="w-1/2">
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">Nama</label>
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{$value->partner->user->name}}</label>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">Email</label>
                                                                <label for="text"
                                                                    class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{$value->partner->email}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="w-1/2">
                                                            <label for="text"
                                                                class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">Nomor
                                                                Telepon</label>
                                                            <label for="text"
                                                                class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{$value->partner->phone}}</label>
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="text"
                                                                class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">Metode
                                                                Pembayaran</label>
                                                            <label for="text"
                                                                class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{$value->payment_method}}
                                                            </label>
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="text"
                                                                class=" bg-white px-2 block mb-2 text-lg text-gray-900 dark:text-gray-900">Total
                                                                Pembayaran</label>
                                                            <label for="text"
                                                                class=" bg-white px-2 block mb-2 text-lg font-semibold text-gray-900 dark:text-gray-900">{{$value->amount}}
                                                            </label>
                                                        </div>
                                                        <img src="{{ asset('assets/public/images/logo.png') }}"
                                                            class="logo-header m-auto w-14">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex items-center p-6 space-x-2  border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-toggle="strukModal" type="button"
                                                            class="m-auto w-full text-white bg-main hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cetak</button>
                                                    </div>
                                                    <div
                                                        class="flex items-center p-6 space-x-2  border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-toggle="strukModal" type="button"
                                                            class="m-auto w-full text-white bg-rose-500 hover:bg-rose-600 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kembali</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerJS')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        let data;
        $(document).ready(function() {
            $('#riwayat-transaksi').DataTable();
            $.ajax({
                url: 'http://127.0.0.1:8000/finance/riwayat/tahun',
                type: 'GET',
                success: function(data) {
                    data = data;
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
    </script>
@endsection
