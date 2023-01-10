<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Mitra\TopUpCoinController as MitraTopUpCoinController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(MitraTopUpCoinController::class)->middleware('permission:top-up-coin')->prefix('/mitra-cp/topup')->name('mitra.topup')->group(function () {
    Route::post('/coins/proses', 'store')->name('.proses');
    Route::post('/coins/notification', 'notification')->name('.notification');
});
