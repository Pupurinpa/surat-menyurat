<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\suratController;
use App\Http\Controllers\daftarSuratController;
use App\Http\Controllers\departementController;
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
Route::get('/surat', function () {
    return view('insertSurat');
});
Route::get('/lists', function () {
    return view('daftarSurat');
});
Route::resource('departement', departementController::class);
