<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Models\Pembelian;
use GuzzleHttp\Middleware;

// Route::get('/test.html',[DashboardController::class,'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('profile', [HomeController::class, 'profile']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('faq', [HomeController::class, 'faq']);
Route::resource('produk', ProdukController::class);
Route::put('produk/{id}', 'ProdukController@update')->name('update_produk');
Route::put('barang/{id}', 'BarangController@update')->name('update_barang');
Route::resource('barang', BarangController::class);
Route::resource('pemasok', PemasokController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('users', UsersController::class);
Route::resource('pembelian', PembelianController::class);
Route::get('/download', [ProdukController::class, 'download']);
// Route::get('/login', [UsersController::class, 'index'])->name('login');


//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//route yang sudah login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('contact', [HomeController::class, 'contact']);

    //route admin
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('produk', ProdukController::class);
    });

    //route kasir
    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('pembelian', PembelianController::class);
    });
});

Route::get('download/produk', [ProdukController::class, 'exportData'])->name('export.produk');
