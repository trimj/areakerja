@extends('templates.finance.page')

@section('content')
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6-darker">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
    </div>
    <div class="flex flex-col lg:flex-row ml-4 gap-4">
        <div class="flex flex-col">
            <div class="flex flex-row ">
                <div class="items-center justify-between bg-white w-full">
                    <div class="p-4 bg-main" style="height: 120px;">
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full">
                                <p class="text-2xl text-white font-bold"> Welcome Back !</p>
                                <p class="text-white">Rose !</p>
                            </div>
                            <div class="flex flex-col w-48 ml-10 mt-5">
                                <img src="{{asset('assets/finance/profile-cover.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="rounded-full items-center justify-between lg:-mt-9 ml-7 w-20 h-20">
                        <img src="{{asset('assets/finance/dummy.svg')}}" alt="">
                    </div>
                    <div class="flex flex-row w-full p-4 gap-2" style="background: white">
                        <div class="flex flex-col w-full">
                            <span class="text-lg">Rose Park</span>
                            <span class="text-sm">Admin</span>
                        </div>
                        <div class="flex flex-col w-full">
                            <div class=" flex flex-row gap-2">
                                <button class="rounded-full items-center bg-main mt-4 w-28 h-8">
                                    Sleep
                                </button>
                                <button class="rounded-full items-center bg-main mt-4 w-28 h-8">
                                    Log out
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex flex-row mt-4 w-auto relative bg-white items-center justify-between">
                <div class="p-4 ">
                    <div class="flex flex-col w-full">
                        <p class="text-lg">Pendapatan Bulanan</p>
                        <p class="text-base mt-2">Bulan ini</p>
                        <p class="text-xl mt-2 font-bold">Rp. 3.500.000</p>
                        <p class="text-base">From Previous Period</p>
                        <button class="rounded-full P-2 w-32 h-8 mt-4 bg-main" data-modal-toggle="pendapatanbulanan">
                            View More
                        </button>
                        <p class="text-base">We Craft Digital, Graphic and thinking</p>
                    </div>
                </div>
                <div class="flex flex-col p-2">
                    <div class="relative p-4 h-48">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class="">

                                </div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class="">

                                </div>
                            </div>
                        </div>
                        <canvas id="doughnutChart" style="display: block; height: 200px; width: 150px;"
                            class="chartjs-render-monitor" width="316" height="229"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <!-- card -->
            <div class="flex flex-col lg:flex-row relative w-auto mt-4 gap-4">

                <div class="sm:w-100 md:w-100 lg:w-48 relative">
                    <div class="flex items-center justify-between p-4 bg-white rounded-mder">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase-light">
                                Kandidat
                            </h6>
                            <span class="text-xl font-semibold">1,235</span>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="sm:w-100 md:w-100 lg:w-48 relative">
                    <div class="flex items-center justify-between p-4 bg-white rounded-mder">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase-light">
                                Non-Kandidat
                            </h6>
                            <span class="text-xl font-semibold">2,765</span>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="sm:w-100 md:w-100 lg:w-48 relative">
                    <div class="flex items-center justify-between p-4 bg-white rounded-mder">
                        <div>
                            <h6
                                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase-light">
                                Company
                            </h6>
                            <span class="text-xl font-semibold">125</span>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- endcard -->

            <!-- chard -->
            <div class="flex flex-col md:flex-row sm:w-100 lg:w-100 md:w-614px relative mt-4">
                <div class="bg-white w-full" x-data="{ isOn: false }">
                    <div class="flex items-center justify-between p-4 border-b">
                        <h4 class="text-lg font-semibold text-gray-500">
                            User
                        </h4>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">Last year</span>
                            <button class="relative focus:outline-none" x-cloak
                                @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                                <div
                                    class="w-12 h-6 transition rounded-full outline-none bg-primary-100">
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
    </div>

    <div class="flex flex-col lg:flex-row sm:w-100 md:w-100 lg:w-full p-4 md:mt-4 gap-4 ">

        <div class="flex flex-row w-full p-4 md:h-80 rounded-md bg-white ">
            <div class="flex flex-col w-full h-full">
                <div class="flex flex-row w-full ">
                    <div class="flex flex-col w-full">
                        <p class="text-base"> Sosial Source </p>
                    </div>
                </div>
                <div class="flex flex-row w-full ">
                    <div class="flex flex-col w-full items-center">
                        <img src="{{asset('assets/finance/dummy.svg')}}" alt="" class="h-16 w-16">
                        <p class="text-base mt-2"> Facebook - 125</p>
                        <p class="text-center">Maecenas nec odio et ente tincidunt tempus</p>
                    </div>
                </div>
                <div class="flex flex-row w-full mt-4">
                    <div class="flex flex-col w-full">
                        <img src="{{asset('assets/finance/dummy.svg')}}" alt="" class="h-16 w-16">
                        <p class="text-base"> Facebook </p>
                        <p>125 Sales</p>
                    </div>
                    <div class="flex flex-col w-full">
                        <img src="{{asset('assets/finance/dummy.svg')}}" alt="" class="h-16 w-16">
                        <p class="text-base"> Twitter </p>
                        <p>112 Sales</p>
                    </div>
                    <div class="flex flex-col w-full">
                        <img src="{{asset('assets/finance/dummy.svg')}}" alt="" class="h-16 w-16">
                        <p class="text-base"> Instagram </p>
                        <p>104 Sales</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex flex-row w-full p-4 md:h-80 rounded-md bg-white ">
            <div class="flex flex-col w-full h-full">
                <div class="flex flex-row w-full ">
                    <p class="text-base">Activity </p>
                </div>
                @foreach($finance as $data)
                <div class="flex flex-row w-full gap-1 mt-2 items-center bg-white rounded-full">
                    <div class="flex flex-col w-32 p-2">
                        <span class="text-base">{{$data->date}}</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <span class="text-base">{{$data->name}}</span>
                        <p class="text-sm text-right">read more</p>
                    </div>
                </div>
                @endforeach
                <div class="flex flex-row w-full gap-4 mt-2 rounded-full">
                    <div class="flex flex-col w-full p-2 items-center">
                        <button class="rounded-full items-center bg-main mt-4 w-28 h-8"
                            data-modal-toggle="activity-modal">
                            View More
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row w-full p-4 md:h-80 rounded-md bg-white ">
            <div class="flex flex-col w-full h-full">
                <div class="flex flex-row w-full ">
                    <p class="text-base"> Pendapatan Tiap Daerah Teratas </p>
                </div>
                <div class="flex flex-row w-full mt-2">
                    <div class="flex flex-col p-2 w-full items-center">
                        <img src="{{asset('assets/public/images/logo.png')}}" alt="" class="h-16 w-16">
                        <p class="mt-2">1,456</p>
                        <p>Bantul</p>
                    </div>
                </div>
                <div class="flex flex-row w-full mt-2 gap-1">
                    <div class="flex flex-col w-full">
                        <span class="text-base">Bantul</span>
                    </div>
                    <div class="flex flex-col w-32 items-center">
                        <span class="font-bold">1,456</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="w-22 h-1 mt-3" style="background-color: orange;"></div>
                    </div>
                </div>

                <div class="flex flex-row w-full mt-2 gap-1">
                    <div class="flex flex-col w-full">
                        <span class="text-base">Sleman</span>
                    </div>
                    <div class="flex flex-col w-32 items-center">
                        <span class="font-bold">1,123</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="w-16 h-1 mt-3" style="background-color: greenyellow;"></div>
                    </div>
                </div>

                <div class="flex flex-row w-full mt-2 gap-1">
                    <div class="flex flex-col w-full">
                        <span class="text-base">Kota Yogyakarta</span>
                    </div>
                    <div class="flex flex-col w-32 items-center">
                        <span class="font-bold">1,026</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="w-14 h-1 mt-3" style="background-color: orange;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row w-96 sm:w-auto ml-4 bg-white">
        <div class="container mx-auto py-6 px-4" x-data="nonkandidat()" x-cloak>
            <div x-show="selectedRows.length"
                class="bg-teal-200 fixed top-0 left-0 right-0 z-40 w-full shadow">
                <div class="container mx-auto px-4 py-4">
                    <div class="flex md:items-center">
                        <div class="mr-4 flex-shrink-0">
                            <svg class="h-8 w-8 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div x-html="selectedRows.length + ' rows are selected'"
                            class="text-teal-800 text-lg"></div>
                    </div>
                </div>
            </div>

            <div class="mb-4 flex justify-between items-center">
                <div class="flex flex-row">
                    <p class="text-xl">Riwayat Transaksi Terakhir</p>
                </div>
                <div class="flex flex-row mr-16 gap-8">
                    <span data-modal-toggle="tambahriwayattransaksi" class="cursor-pointer">
                        <i class="fa-solid fa-pen-to-square"></i></span>
                    <span><i class="fa-sharp fa-solid fa-trash"></i></span>
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative h-80">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID Order</th>
                                <th>Nama</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Aksi</th>
                            </tr>
                            {{-- <tr class="text-left">
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                    <label
                                        class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                        <input type="checkbox"
                                            class="form-checkbox focus:outline-none focus:shadow-outline"
                                            @click="selectAllCheckbox($event);">
                                    </label>
                                </th>
                                <template x-for="heading in headings">
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs"
                                        x-text="heading.value" :x-ref="heading.key"
                                        :class="{ [heading.key]: true }"></th>
                                </template>
                            </tr> --}}
                        </thead>
                        <tbody>
                            @foreach($riwayat as $key=>$value)
                            <tr>
                                <td class="text-center">{{ $value->id }}</td>
                                <td class="text-center">{{ $value->billing_name }}</td>
                                <td class="text-center">{{ $value->date }}</td>
                                <td class="text-center">{{ $value->total }}</td>
                                <td class="text-center">{{ $value->payment_status }}</td>
                                <td class="text-center">{{ $value->payment_method }}</td>
                                <td class="">
                                        <button
                                            class="py-1 text-sm item-center text-white bg-main rounded-full w-28">View
                                            Details</button>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <template x-for="user in users" :key="user.id">
                                <tr>
                                    <td class="border-dashed border-t border-gray-200 px-3">
                                        <label
                                            class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                            <input type="checkbox"
                                                class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline"
                                                :name="user.id"
                                                @click="getRowDetail($event, user.id)">
                                        </label>
                                    </td>
                                    <td class="border-dashed border-t border-gray-200 userId">
                                        <span class="text-gray-700 px-6 py-3 flex items-center"
                                            x-text="user.id"></span>{{ $value->id }}
                                    </td>
                                    <td class="border-dashed border-t border-gray-200 Name">
                                        <span class="text-gray-700 px-6 py-3 flex items-center"
                                            x-text="user.billing_name"></span>{{ $value->billing_name }}
                                    </td>
                                    <td class="border-dashed border-t border-gray-200 Umur">
                                        <span class="text-gray-700 px-6 py-3 flex items-center"
                                            x-text="user.date"></span>{{ $value->date }}
                                    </td>
                                    <td class="border-dashed border-t border-gray-200 Total">
                                        <span class="text-gray-700 px-6 py-3 flex items-center"
                                            x-text="user.total"></span>{{ $value->total }}
                                    </td>
                                    <td class="border-dashed border-t border-gray-200 Status">
                                        <span class="text-gray-700 px-6 py-3 flex items-center"
                                            x-text="user.payment_status"></span>{{ $value->payment_status }}
                                    </td>
                                    <td class="border-dashed border-t border-gray-200 PaymentMethod">
                                        <span class="text-gray-700 px-6 py-3 flex items-center"
                                            x-text="user.payment_method"></span>{{ $value->payment_method }}
                                    </td>
                                    <td class="border-dashed border-t border-gray-200 Detail">
                                        <a href="#">
                                            <button
                                                class="mt-10 px-4 py-1 text-sm text-white bg-main rounded-full w-28">View
                                                Details</button>
                                        </a>
                                    </td>
                                </tr>
                            </template> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="activity-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow w-4/5 mx-auto">
                <div class="relative w-full h-12">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="activity-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <h1 class="text-3xl pl-4 font-extrabold">Activity</h1>
                <div class="p-4 w-full text-right">
                    <nav aria-label="Page navigation example justify-end">
                        <ul class="inline-flex -space-x-px">
                            <li>
                                <a href="#"
                                    class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">Previous</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mt-3 p-4">
                    @foreach($finance as $data)
                    <div class="bg-gray-300 rounded-lg flex flex-row px-4 py-2 my-4">
                        <div class="w-30% text-slate-500">
                            {{$data->date}}
                        </div>
                        <div>
                            <h3 class="font-bold">{{$data->name}}</h3>
                            <p class="text-slate-500 text-sm">{{$data->company}}</p>
                        </div>
                    </div>
                    @endforeach
                    <button class="rounded-lg border px-4 py-2 font-bold mx-auto block mt-12">Load More</button>
                    <button
                        class="bg-orange-500 block mt-7 font-bold text-xs text-white px-4 py-2 rounded-lg">CETAK</button>
                    <button class="bg-rose-500 block mt-3 font-bold text-xs text-white px-4 py-2 rounded-lg"
                        data-modal-toggle="activity-modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>

    <div id="tambahriwayattransaksi" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="tambahriwayattransaksi">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-10 text-xl font-medium text-gray-900 dark:text-white">Riwayat Transaksi Terakhir</h3>
                    <form class="space-y-6" action="#">
                        <div class="relative">
                            <label for="text"
                                class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Order
                                Id</label>
                            <input type="text" name="order" id="order"
                                class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="SK2544" required="">
                        </div>
                        <div class="relative">
                            <label for="text"
                                class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Billing
                                Name</label>
                            <input type="text" name="billingname" id="billingname"
                                class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Jacob Hunter" required="">
                        </div>
                        <div class="relative">
                            <label for="text"
                                class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                            <input type="date" name="date" id="date"
                                class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="04 Oktober 2022" required="">
                        </div>
                        <div class="relative">
                            <label for="text"
                                class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Items</label>
                            <input type="text" name="items" id="items"
                                class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Bergabung Mitra" required="">
                        </div>
                        <div>
                            <select name="paymentstatus" id="paymentstatus"
                                class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="04 Oktober 2022" required="">
                                <option value="Oke">Pilih Paymen Status</option>
                                <option value="Oke">Oke</option>
                                <option value="Oke">Polije</option>
                                <option value="Oke">Sip</option>
                            </select>
                        </div>
                        <div class="relative">
                            <label for="text"
                                class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Payment
                                Method</label>
                            <input type="text" name="paymentmethod" id="paymentmethod"
                                class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Visa" required="">
                        </div>
                        <div style="margin-bottom: -10px;">
                            <button type="submit"
                                class="w-200 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                        </div>
                        <div style="margin-bottom: -10px;">
                            <button type="submit"
                                class="w-200 text-white bg-rose-500 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">Delete</button>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-200 text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="pendapatanbulanan" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-6xl h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="pendapatanbulanan">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-10 text-xl font-medium text-gray-900 dark:text-white">Riwayat Transaksi Terakhir</h3>
                    <div class="overflow-scroll h-614px">
                        <table class="shadow-lg bg-white border-separate w-full h-full">
                            <thead>
                                <tr>
                                    <th class="bg-blue-100 border text-left px-8 py-4" rowspan="2"
                                        style="text-align: center; vertical-align: middle; border-right:none;">Area
                                        kerja laporan
                                        laba rugi</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" colspan="12"
                                        style="text-align: center; border-left: none;">2022</th>
                                </tr>
                                <tr>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">Jan</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">Feb</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">Mar</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">APR</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">May</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">JUN</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">JUL</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">AUG</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">SEP</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">OCT</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">NOV</th>
                                    <th class="bg-blue-100 border text-left px-8 py-4" scope="col"
                                        style="border: none;">DES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row" class="border px-8 py-4">Aliran Pendapatan 1</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row" style="border-bottom-color: black;">Aliran
                                        Pendapatan
                                        2</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                </tr>
                                <tr>
                                    <th class="border px-8 py-4" scope="row" style="border-top-color: black; ">Total
                                        Pendapatan
                                        Bersih</th>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row" style="border-bottom-color: black;">Harga
                                        Pokok
                                        Penjualan</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                </tr>
                                <tr>
                                    <th class="border px-8 py-4" scope="row">Laba Kotor</th>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                </tr>
                                <tr>
                                    <th class="border px-8 py-4" scope="row">Pengeluaran</th>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Periklanan & Promosi</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                    <td class="border px-8 py-4"></td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Pertanggungan</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Pemeliharaan</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Peralatan Kantor</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Menyewa</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Gaji, Tunjangan & Upah</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Telekomunikasi</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Berpergian</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Keperluan</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Biaya Lainnya...</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row"
                                        style="border-bottom-color: black; border-top-color: black;">Total Biaya</td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                    <td class="border px-8 py-4"
                                        style="border-bottom-color: black; border-top-color: black;">-
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border px-8 py-4" scope="row" style="border-top-color: black; ">Laba
                                        Sebelum Bunga
                                    </th>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                    <td class="border px-8 py-4" style="border-top-color: black; ">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row">Depresiasi & Amortisasi</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                    <td class="border px-8 py-4">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-8 py-4" scope="row" style="border-bottom-color: black;">Beban
                                        Bunga</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                    <td class="border px-8 py-4" style="border-bottom-color: black;">-</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div style="margin-bottom: 10px; margin-top: 30px;">
                        <button type="submit"
                            class="w-200 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <button type="submit"
                            class="w-200 text-white bg-rose-500 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">Delete</button>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-200 text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerJS')
    <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="{{asset('js/finance.js')}}"></script>
    <script src="{{asset('vendor/datatable/datatables.js')}}"></script>
    <script src="https://kit.fontawesome.com/d770eb273a.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem("dark")) {
                    return JSON.parse(window.localStorage.getItem("dark"));
                }

                return (
                    !!window.matchMedia &&
                    window.matchMedia("(prefers-color-scheme: dark)")
                        .matches
                );
            };

            const setTheme = (value) => {
                window.localStorage.setItem("dark", value);
            };

            const getColor = () => {
                if (window.localStorage.getItem("color")) {
                    return window.localStorage.getItem("color");
                }
                return "cyan";
            };

            const setColors = (color) => {
                const root = document.documentElement;
                root.style.setProperty(
                    "--color-primary",
                    `var(--color-${color})`
                );
                root.style.setProperty(
                    "--color-primary-50",
                    `var(--color-${color}-50)`
                );
                root.style.setProperty(
                    "--color-primary-100",
                    `var(--color-${color}-100)`
                );
                root.style.setProperty(
                    "--color-primary-light",
                    `var(--color-${color}-light)`
                );
                root.style.setProperty(
                    "--color-primary-lighter",
                    `var(--color-${color}-lighter)`
                );
                root.style.setProperty(
                    "--color-primary-dark",
                    `var(--color-${color}-dark)`
                );
                root.style.setProperty(
                    "--color-primary-darker",
                    `var(--color-${color}-darker)`
                );
                this.selectedColor = color;
                window.localStorage.setItem("color", color);
                //
            };

            const updateBarChart = (on) => {
                const data = {
                    data: randomData(),
                    backgroundColor: "rgb(207, 250, 254)",
                };
                if (on) {
                    barChart.data.datasets.push(data);
                    barChart.update();
                } else {
                    barChart.data.datasets.splice(1);
                    barChart.update();
                }
            };

            const updateDoughnutChart = (on) => {
                const data = random();
                const color = "rgb(207, 250, 254)";
                if (on) {
                    doughnutChart.data.labels.unshift("Seb");
                    doughnutChart.data.datasets[0].data.unshift(data);
                    doughnutChart.data.datasets[0].backgroundColor.unshift(
                        color
                    );
                    doughnutChart.update();
                } else {
                    doughnutChart.data.labels.splice(0, 1);
                    doughnutChart.data.datasets[0].data.splice(0, 1);
                    doughnutChart.data.datasets[0].backgroundColor.splice(
                        0,
                        1
                    );
                    doughnutChart.update();
                }
            };

            const updateLineChart = () => {
                lineChart.data.datasets[0].data.reverse();
                lineChart.update();
            };

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark;
                    setTheme(this.isDark);
                },
                setLightTheme() {
                    this.isDark = false;
                    setTheme(this.isDark);
                },
                setDarkTheme() {
                    this.isDark = true;
                    setTheme(this.isDark);
                },
                color: getColor(),
                selectedColor: "cyan",
                setColors,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen;
                },
                isSettingsPanelOpen: false,
                openSettingsPanel() {
                    this.isSettingsPanelOpen = true;
                    this.$nextTick(() => {
                        this.$refs.settingsPanel.focus();
                    });
                },
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true;
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus();
                    });
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true;
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus();
                    });
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true;
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus();
                    });
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true;
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus();
                    });
                },
                updateBarChart,
                updateDoughnutChart,
                updateLineChart,
            };
        };
    </script>
    <script>
        function nonkandidat() {
            return {
                headings: [
                    {
                        'key': 'id',
                        'value': 'Order ID'
                    },
                    {
                        'key': 'billing_name',
                        'value': 'Billing Name'
                    },
                    {
                        'key': 'date',
                        'value': 'Date'
                    },
                    {
                        'key': 'total',
                        'value': 'Total'
                    },
                    {
                        'key': 'payment_status',
                        'value': 'Payment Status'
                    },
                    {
                        'key': 'payment_method',
                        'value': 'Payment Method'
                    },
                    {
                        'key': 'Detail',
                        'value': 'Detail'
                    }
                ],

                users: [{
                    "id": $value->id,
                    "billing_name": $value->billing_name,
                    "date": $value->date,
                    "total": $value->total,
                    "payment_status": $value->payment_status,
                    "payment_method": $value->payment_method
                }],
                selectedRows: [],

                open: false,

                toggleColumn(key) {
                    // Note: All td must have the same class name as the headings key! 
                    let columns = document.querySelectorAll('.' + key);

                    if (this.$refs[key].classList.contains('hidden') && this.$refs[key].classList.contains(key)) {
                        columns.forEach(column => {
                            column.classList.remove('hidden');
                        });
                    } else {
                        columns.forEach(column => {
                            column.classList.add('hidden');
                        });
                    }
                },

                getRowDetail($event, id) {
                    let rows = this.selectedRows;

                    if (rows.includes(id)) {
                        let index = rows.indexOf(id);
                        rows.splice(index, 1);
                    } else {
                        rows.push(id);
                    }
                },

                selectAllCheckbox($event) {
                    let columns = document.querySelectorAll('.rowCheckbox');

                    this.selectedRows = [];

                    if ($event.target.checked == true) {
                        columns.forEach(column => {
                            column.checked = true
                            this.selectedRows.push(parseInt(column.name))
                        });
                    } else {
                        columns.forEach(column => {
                            column.checked = false
                        });
                        this.selectedRows = [];
                    }
                }
            }
        }
    </script>
@endsection