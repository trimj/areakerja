{{-- web --}}
Route::controller(FinancialController::class)->name('.riwayat')->group(function () {
    Route::get('/riwayat', 'index')->name('.index');
    Route::get('/riwayat/create', 'create')->name('.create');
    Route::post('/riwayat/create', 'store')->name('.store');
    Route::get('/riwayat/edit/{role:id}', 'edit')->name('.edit');
    Route::put('/riwayat/edit/{role:id}', 'update')->name('.update');
    Route::post('/riwayat/edit/{role:id}/sync', 'syncPermissions')->name('.permission.sync');
    Route::delete('/riwayat/edit/{role:id}/delete', 'destroy')->name('.destroy');
});

{{-- dashboard.blade --}}
@foreach($riwayat as $key=>$value)
                    "userId": {{ $value->id }},
                    "Name": {{ $value->billing_name }},
                    "Umur": {{ $value->date }},
                    "Total": {{ $value->total }},
                    "Status": {{ $value->payment_status }},
                    "PaymentMethod": {{ $value->payment_method }}
                    @endforeach

                    <div class="py-6 px-6 lg:px-8">
                        <h3 class="mb-10 text-xl font-medium text-gray-900 dark:text-white">Riwayat Transaksi Terakhir</h3>
                        <form class="space-y-6" method="POST" action="{{url('finance.riwayat.update'.$riwayat->id)}}">
                            @csrf
                            <div class="relative">
                                <label for="text"
                                    class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Order
                                    Id</label>
                                <input type="text" name="id" id="id"
                                    class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    value="{{$riwayat->id}}">
                            </div>
                            <div class="relative">
                                <label for="text"
                                    class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Billing
                                    Name</label>
                                <input type="text" name="billing_name" id="billing_name"
                                    class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    value="{{$riwayat->billing_name}}">
                            </div>
                            <div class="relative">
                                <label for="text"
                                    class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                                <input type="date" name="date" id="date"
                                    class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    value="{{$riwayat->date}}">
                            </div>
                            <div class="relative">
                                <label for="text"
                                    class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total</label>
                                <input type="text" name="total" id="total"
                                    class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    value="{{$riwayat->total}}">
                            </div>
                            <div>
                                <select name="payment_status" id="payment_status"
                                    class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required="">
                                    <option selected>{{$riwayat->payment_status}}</option>
                                    <option value="oke">oke</option>
                                    <option value="sip">sip</option>
                                </select>
                            </div>
                            <div class="relative">
                                <label for="text"
                                    class="absolute -top-3.5 left-5 bg-white px-2 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Payment
                                    Method</label>
                                <input type="text" name="payment_method" id="payment_method"
                                    class="bg-white border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    value="{{$riwayat->payment_method}}">
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



{{-- controller --}}

<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Financial;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = Financial::all();
        return view('/finance/dashboard', compact(['riwayat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $riwayat = new Financial;
        return view('/finance/dashboard', compact(
            'riwayat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $riwayat = new Financial();
        $riwayat->id = $request->id;
        $riwayat->billing_name = $request->billing_name;
        $riwayat->date = $request->date;
        $riwayat->total = $request->total;
        $riwayat->payment_status = $request->payment_status;
        $riwayat->payment_method = $request->total;
        $riwayat->save();

        return redirect('financial');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(Financial $financial, $id)
    {
        $riwayat = Financial::find($id);
        return view('/finance/dashboard', compact(
            ['riwayat']
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(Financial $financial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financial $financial, $id)
    {
        $riwayat = Financial::find($id);
        $riwayat->id = $request->id;
        $riwayat->billing_name = $request->billing_name;
        $riwayat->date = $request->date;
        $riwayat->total = $request->total;
        $riwayat->payment_status = $request->payment_status;
        $riwayat->payment_method = $request->total;
        $riwayat->save();

        return redirect('financial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financial $financial, $id)
    {
        $riwayat = Financial::find($id);
        $riwayat->delete();
        return redirect('financial');
    }
}
