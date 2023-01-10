<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoreaboutController extends Controller
{
    public function index(){
        return view('public.about.index');
    }
}
