<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class EditHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $string = "";

    public function index()
    {
        // if (Cookie::get('edit-harga') == null) {
        //     Mail::to('super-admin@mail.com')->send();
        //     return view('finance.verifikasi');
        // } else {
            $harga = Price::all();
            return view('finance.edit-harga', compact('harga'));
            $product = Product::all();
            $no = 1;
            return view('finance.edit-harga', compact('product','no'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cookie::queue('edit-harga', $this->string, 1440);
        return redirect(route('finance.edit-harga'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $harga = Price::find($id);
        // dd($harga);
        $harga->id = $request->id;
        $harga->price = $request->price;
        $harga->save();

        return redirect(route('finance.edit-harga'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function simpanharga(Request $request){
        // dd($request->request->all()['id']);
        foreach ($request->request->all()['id'] as $key => $value) {
            // dd($value);
            $simpan[$key] = Product::find($value);
            if (isset($request->request->all()['tombol'][$key])) {
                
                $simpan[$key]->update(['price'=>$request->request->all()['price'][$key],'promo'=>$request->request->all()['promo'][$key],'promo_status'=>$request->request->all()['tombol'][$key],'total'=>$request->request->all()['total'][$key]]);
            }else {
                $status = 0;
                $simpan[$key]->update(['price'=>$request->request->all()['price'][$key],'promo'=>$request->request->all()['promo'][$key],'promo_status'=>$status,'total'=>$request->request->all()['total'][$key]]);
                
            }
        }
        return redirect(route('finance.edit-harga'));
    }
}
