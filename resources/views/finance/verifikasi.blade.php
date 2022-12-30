@extends('templates.finance.page')

@section('headerCSS')
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
    <div class="container mx-auto mt-24">
        <div class="max-w-sm mx-auto md:max-w-lg">
            <div class="w-full">
                <div class="bg-white py-3 rounded text-center">
                    <h1 class="text-2xl font-bold">UPPS</h1>
                    <div class="flex flex-col">
                        Untuk Edit Harga harus konfirmasi dengan Super Admin <br>
                        Hubungin Super Admin untuk Kode Verifikasi
                    </div>

                    <form action="{{route('finance.edit-harga.store')}}" method="POST">
                        @csrf
                        <div id="otp" class="flex flex-row justify-center text-center px-2 mt-5">
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" name="code[]" type="text" id="first"
                                maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" name="code[]" type="text" id="second"
                                maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" name="code[]" type="text" id="third"
                                maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" name="code[]" type="text" id="fourth"
                                maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" name="code[]" type="text" id="fifth"
                                maxlength="1" />
                            <input class="m-2 border h-10 w-10 text-center form-control rounded" name="code[]" type="text" id="sixth"
                                maxlength="1" />
                        </div>
    
                        <div class="flex ml-4 flex-col text-left">
                            <a href="{{route('finance.edit-harga.index')}}" class="flex text-main hover:text-main-active cursor-pointer">Kirim Ulang Kode</a>
                            {{!$sent ? 'Harap tunggu setidaknya 5 menit untuk mengirim ulang kode verifikasi' : ''}}
                        </div>
    
                        <button type="submit" class="font-bold bg-main px-48 mt-8 py-2 text-white">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
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
