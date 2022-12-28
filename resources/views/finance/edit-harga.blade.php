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
    <button class="bg-main w-full rounded-lg py-2 text-white my-3" data-modal-toggle="edithargamodal">
        Edit Harga Coin
    </button>

    <div id="edithargamodal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-white mt-32 pb-8">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="edithargamodal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mt-5 mb-3 text-2xl text-center font-bold text-gray-900 dark:text-gray-900">Edit Harga Koin</h3>
                    <form method="POST" action="{{url('finance/edit-harga/1')}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="flex flex-row justify-center mt-10">
                            <h3 class="text-left text-2xl font-bold mt-4">1 POIN =</h3>
                            <div class="relative px-4">
                                <label class="absolute -top-3.5 left-5 bg-white z-50" for="price">Nominal</label>
                                <input class="w-full border p-2 border-gray-900 rounded-lg outline-none focus:border-main"
                                type="text" id="price" name="price" value="{{$harga[0]->price}}" required/>
                            </div>
                        </div>
                        <h3 class="mt-5 mb-3 text-xs text-center text-gray-900 dark:text-gray-900">Harga setiap pembayaran akan berbeda karena mengikuti pajak</h3>
                        <div class="flex flex-row mt-5 justify-center px-8">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-3 w-full rounded-lg">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <button class="bg-main w-full rounded-lg py-2 text-white my-3" data-modal-toggle="pelatihanmodal">
        Edit Harga Pelatihan
    </button>
    

    <div id="pelatihanmodal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-white mt-32 pb-8">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="pelatihanmodal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mt-5 mb-3 text-2xl text-center font-bold text-gray-900 dark:text-gray-900">Edit Harga Pelatihan Skill Level</h3>
                    <form method="POST" action="{{url('finance/edit-harga/2')}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="flex flex-row justify-center mt-10">
                            <h3 class="text-left text-xl font-bold mt-4">Pelatihan Skill Level :</h3>
                            <div class="relative px-4">
                                <label class="absolute -top-3.5 left-5 bg-white px-2 z-50" for="price">Nominal</label>
                                <input class="w-full border p-2 border-gray-900 rounded-lg outline-none focus:border-main"
                                type="text" id="price" name="price" value="{{$harga[1]->price}}" required/>
                            </div>
                        </div>
                        <div class="flex flex-row mt-5 justify-center px-8">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white p-3 w-full rounded-lg">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<form action="{{route('finance.simpanharga')}}" method="post">
@csrf
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
            @foreach($product as $data)
            <tr>
                <td class="text-center">{{$data->id}} <input type="text" name="id[]" value="{{$data->id}}" hidden></td>
                <td>
                    <p>{{$data->name}}</p>
                    <p>{{$data->keterangan}}</p>
                </td>
                <td class="text-center"><input type="number" value="{{$data->price}}" class="bg-gray-100 rounded-lg border-gray-300" name="price[]" onkeyup="sum({{$no}})"
                        id="price{{$no}}">
                </td>
                <td class="text-center">
                    <label class="inline-flex relative items-center cursor-pointer align-middle mr-5">
                        <input type="checkbox" value="1" class="sr-only peer" name="tombol[]" id="tombol{{$no}}" onclick="sum({{$no}})" <?php if($data['promo_status']==1) echo 'checked'?>>
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-main2 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main">
                        </div>
                    </label>
                    <input type="number" value="{{$data->promo}}" class="bg-gray-100 rounded-lg border-gray-300" name="promo[]" id="promo{{$no}}" onkeyup="sum({{$no}})">
                </td>
                <td class="text-center">
                    <input type="number" id="total{{$no}}" value="{{$data->total}}" name="" disabled>
                    <input type="number" id="totall{{$no}}" value="{{$data->total}}" name="total[]" hidden>
                </td>
            </tr>
            {{$no++}}
            @endforeach
        </tbody>
    </table>
    <button class="w-full bg-green-500 text-white rounded-lg py-2 my-10" type="submit">Simpan</button>
</form>

@endsection

@section('footerJS')
<script>
    function sum(no) {
     var txtprice = document.getElementById('price'+no).value;
     var txtpromo = document.getElementById('promo'+no).value;
     var toggle = document.getElementById('tombol'+no);
     if (toggle.checked == true) {
        var result = parseInt(txtprice)-parseInt(txtpromo);
        if (!isNaN(result)) {
         document.getElementById('total'+no).value = result;
         document.getElementById('totall'+no).value = result;
        }        
     }else{
        var result = parseInt(txtprice)+0;
        var tombol = 0;
        document.getElementById('total'+no).value = tombol;
        if (!isNaN(result)) {
         document.getElementById('total'+no).value = result;
         document.getElementById('totall'+no).value = result;
        }  
     }
  }
</script>
@endsection
