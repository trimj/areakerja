<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Product;
use App\Mail\EditHarga;
use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class EditHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Cookie::get('edit-harga') == null) {
            $email = Email::whereDate('created_at', Carbon::today())->where('user_id', '=', Auth::id())->first();
            $sent = true;
            if (!isset($email)) {
                $code = random_int(100000, 999999);
                Email::create([
                    'code' => $code,
                    'user_id' => Auth::id(),
                    'type' => 'edit-harga',
                    'sent_at' => Carbon::now()->timestamp,
                ]);
            } else {
                $sent_at = new Carbon($email->sent_at);
                if ($sent_at->addMinutes(10)->timestamp <= Carbon::now()->timestamp) {
                    $email->sent_at = Carbon::now()->toDateTimeString();
                    $code = $email->code;
                    $email->save();
                } else {
                    $sent = false;
                }
            }
            if ($sent) {
                Mail::to('super-admin@mail.com')->send(new EditHarga($code));
            }
            return view('finance.verifikasi', compact('sent'));
        } else {
            $harga = Price::all();
            $product = Product::all();
            $no = 1;
            return view('finance.edit-harga', compact('harga','product','no'));
        }
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
        $inputCode = implode("", $request->request->all()['code']);
        $dbCode = Email::where('code', '=', $inputCode)->where('user_id', '=', Auth::id())->first();
        Email::where('user_id', '=', Auth::id())->delete();
        if (isset($dbCode)) {
            Cookie::queue('edit-harga', $inputCode, 1440);
        }
        return redirect(route('finance.edit-harga.index'));
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

        return redirect(route('finance.edit-harga.index'));
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
        return redirect(route('finance.edit-harga.index'));
    }
}
