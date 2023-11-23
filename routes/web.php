<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin'])->group(function (){
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('', 'index')->name('kategori');
        Route::get('create', 'create')->name('kategori.create');
        Route::post('store', 'store')->name('kategori.store');
    Route::get('edit/{id}', 'edit')->name('kategori.edit');
    Route::put('edit/{id}', 'update')->name('kategori.update');
    Route::delete('destroy/{id}', 'destroy')->name('kategori.destroy');
});
Route::controller(PelangganController::class)->prefix('pelanggan')->group(function () {
    Route::get('', 'index')->name('pelanggan');
    Route::get('create', 'create')->name('pelanggan.create');
    Route::post('store', 'store')->name('pelanggan.store');
    Route::get('edit/{id}', 'edit')->name('pelanggan.edit');
    Route::put('edit/{id}', 'update')->name('pelanggan.update');
    Route::delete('destroy/{id}', 'destroy')->name('pelanggan.destroy');
});
Route::controller(PembayaranController::class)->prefix('pembayaran')->group(function () {
    Route::get('', 'index')->name('pembayaran');
    Route::get('create', 'create')->name('pembayaran.create');
    Route::post('store', 'store')->name('pembayaran.store');
    Route::get('edit/{id}', 'edit')->name('pembayaran.edit');
    Route::put('edit/{id}', 'update')->name('pembayaran.update');
    Route::delete('destroy/{id}', 'destroy')->name('pembayaran.destroy');
});

});
