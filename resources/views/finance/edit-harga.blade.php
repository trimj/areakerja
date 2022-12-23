@extends('templates.finance.page')

@section('headerCSS')
    <style>
        input[type="number"] {
            width: auto;
            border-radius: 0.375rem;
            padding-top: 0.4rem;
            padding-bottom: 0.4rem;
            padding-left: 0.7rem;
            padding-right: 0.7rem;
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(229 231 235 / var(--tw-ring-opacity));
        }
    </style>
@endsection

@section('content')
    <div class="flex flex-row">
        <div class="flex-grow">
            <h1 class="text-xs font-bold ml-2 mb-5">EDIT HARGA</h1>
        </div>
        <div class="text-right text-xs flex-grow">
            <p>Invoice / List</p>
        </div>
    </div>
    <button class="bg-main w-full rounded-lg py-2 text-white my-3">
        Edit Harga Coin
    </button>
    <button class="bg-main w-full rounded-lg py-2 text-white my-3">
        Edit Harga Pelatihan
    </button>

    <table class="table-auto w-full">
        <thead class="h-16">
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga Coin</th>
                <th>Promo</th>
                <th>Total Coin</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                        id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                        id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                        id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                        id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                        id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                        id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300"
                        name="" id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300"
                        name="" id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300"
                        name="" id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300"
                        name="" id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300"
                        name="" id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
            <tr>
                <td class="text-center">034214002</td>
                <td>
                    <p>Paket Pasang Lowongan</p>
                    <p>Tipe Gold</p>
                </td>
                <td class="text-center"><input type="number" class="bg-gray-100 rounded-lg border-gray-300"
                        name="" id="">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name="" id="">
                </td>
                <td class="text-center">
                    198
                </td>
            </tr>
        </tbody>
    </table>

    <button class="w-full bg-green-500 text-white rounded-lg py-2 my-10">Simpan</button>
@endsection

@section('footerJS')
@endsection
