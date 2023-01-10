<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $invoice = Invoice::all();
        // dd($invoice);
        return view('finance.invoice', compact('invoice'));
    }
    public function show($id){
        $invoice = Invoice::find($id);
        // dd($invoice);
        return view('finance.detailinvoice', compact('invoice'));
    }
}
