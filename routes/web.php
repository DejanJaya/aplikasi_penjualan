<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/beranda', [MenuController::class, 'home']);
Route::get('/info', [MenuController::class, 'info_kegiatan']);
Route::get('/user', [UserController::class, 'index']);
Route::post('/transaksi/clear', [TransaksiController::class, 'clear']);
Route::post('/transaksi/pembayaran/', [TransaksiController::class, 'pembayaran']);
Route::resource('user', UserController::class)->middleware('can:isAdmin');
Route::resource('produk', ProdukController::class)->middleware('can:isAdmin');
Route::resource('transaksi', TransaksiController::class)->middleware('can:isAdmin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
