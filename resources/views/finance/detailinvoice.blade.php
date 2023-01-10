@extends('templates.finance.page')

@section('content')
<main class="min-h-screen p-5">
                    <!-- Content header -->
                    <div
                        class="flex items-center justify-between px-4 py-4 border-b lg:py-6">
                        <h1 class="text-2xl font-semibold">Invoice Detail</h1>
                        <span><p>Invoice / Detail</p></span>
                    </div>

                    <div class="flex flex-row w-full">
                        <div class="flex flex-col w-full p-5 h-full bg-white bg-contain bg-no-repeat bg-center bg-opacity-20  ">
                            <div class="flex flex-row w-full mt-2">
                                <img class="w-14" src="/src/img/logo.png" alt="">
                                <p class="text-right mt-1 w-full"> Order # {{$invoice->id}} </p>
                            </div>

                            <div class="flex flex-row mt-4">
                                <div class="flex flex-col">
                                    <p class="text-xl font-bold">Billed To:</p>
                                    <p class="text-base">{{$invoice->partner->user->name}}</p>
                                    <p class="text-base">1234 Main</p>
                                    <p class="text-base">{{$invoice->partner->address['provinsi']}}</p>
                                    <p class="text-base">{{$invoice->partner->address['jalan']}}</p>
                                </div>
                            </div>

                            <div class="flex flex-row mt-4 w-full">
                                <div class="flex flex-col w-full">
                                    <p class="text-xl font-bold">Payment Method;</p>
                                    <span>
                                    <p class="text-base">Visa ending *****4242</p>
                                    <p class="text-base">{{$invoice->partner->email}}</p>
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-row mt-8 w-full">
                                <div class="flex flex-col w-full">
                                    <p class="text-2xl font-bold">Order Summary</p>
                                    <table class="table-auto w-full">
                                        <thead class="w-full">
                                            <tr>
                                                <th class="text-start w-16">ID Transaksi</th>
                                                <th class="text-start">Produk</th>
                                                <th class="text-right w-56">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody class="w-full">
                                            <tr class="h-12">
                                                <td class="w-16">{{$invoice->logkoin->id}}</td>
                                                <td>Coin {{$invoice->logkoin->coins}}</td>
                                                <td class="text-right w-56">Rp. {{$invoice->amount}} </td>
                                            </tr>
                                            <tr class="h-12">
                                                <td class="w-16"></td>
                                                <td class="text-xl font-bold text-right">Jumlah</td>
                                                <td class="text-right font-bold w-56">Rp. {{$invoice->amount}} </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="flex flex-row mt-5 w-full gap-4">
                                <div class="flex flex-col w-full"></div>
                                    <button onclick="window.print()" class="bg-green-400 hover:bg-green-600 py-2 px-4 rounded-lg shadow hover:shadow-xl duration-300">Cetak</button>
                                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">Send <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownDivider" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 466px);">
                                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDividerButton">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Email</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Telegram</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Whats App</a>
                                        </li>
                                        </ul>
                                    </div>
                            </div>

                        </div>
                    </div>

                    <div class="flex flex-row w-full p-8">
                        <div class="flex flex-col w-full"></div>
                        <a href="/finance/invoice" type="button" class="w-20 h-9 bg-red-500 hover:bg-red-700 rounded-md text-center p-1">Back</a>
                    </div>

                </main>
                @endsection

@section('footerJS')
@endsection