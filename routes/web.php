<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\departementController;
use App\Http\Controllers\tipeController;
use App\Http\Controllers\suratController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lists', function () {
    return view('daftarSurat');
});
Route::resource('departement', departementController::class);
Route::resource('tipe', tipeController::class);
Route::resource('surat', suratController::class);