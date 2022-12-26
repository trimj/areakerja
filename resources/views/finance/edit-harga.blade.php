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
    @if (Cookie::get('edit-harga') == null)
        <div class="container mx-auto mt-24">
            <div class="max-w-sm mx-auto md:max-w-lg">
                <div class="w-full">
                    <div class="bg-white py-3 rounded text-center">
                        <h1 class="text-2xl font-bold">UPPS</h1>
                        <div class="flex flex-col">
                            Untuk Edit Harga harus konfirmasi dengan Super Admin <br>
                            Hubungin Super Admin untuk Kode Verifikasi
                        </div>

                        <div id="otp" class="flex flex-row justify-center text-center px-2 mt-5">
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text"
                                id="first" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text"
                                id="second" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text"
                                id="third" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text"
                                id="fourth" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text"
                                id="fifth" maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text"
                                id="sixth" maxlength="1" />
                        </div>

                        <div class="flex ml-4">
                            <a class="flex text-main hover:text-main-active cursor-pointer">Kirim Ulang Kode</a>
                        </div>

                        <button class="font-bold bg-main px-48 mt-8 py-2 text-white">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <button class="bg-main w-full rounded-lg py-2 text-white my-3">
            Edit Harga Coin
        </button>
        <button class="bg-main w-full rounded-lg py-2 text-white my-3">
            Edit Harga Pelatihan
        </button>

        <table class="table-auto w-full mt-5">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
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
                        <input type="number" class="bg-gray-100 rounded-lg border-gray-300" name=""
                            id="">
                    </td>
                    <td class="text-center">
                        198
                    </td>
                </tr>
            </tbody>
        </table>

        <button class="w-full bg-green-500 text-white rounded-lg py-2 my-10">Simpan</button>
    @endif
@endsection

@section('footerJS')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            function OTPInput() {
                const inputs = document.querySelectorAll('#otp > *[id]');
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('keydown', function(event) {
                        if (event.key === "Backspace") {
                            inputs[i].value = '';
                            if (i !== 0) inputs[i - 1].focus();
                        } else {
                            if (i === inputs.length - 1 && inputs[i].value !== '') {
                                return true;
                            } else if (event.keyCode > 47 && event.keyCode < 58) {
                                inputs[i].value = event.key;
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            } else if (event.keyCode > 64 && event.keyCode < 91) {
                                inputs[i].value = String.fromCharCode(event.keyCode);
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            }
                        }
                    });
                }
            }
            OTPInput();
        });
    </script>
@endsection
