<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengirimanController;

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


Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
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
    Route::controller(ProdukController::class)->prefix('produk')->group(function () {
        Route::get('/', 'index')->name('produk.index');
        Route::get('create', 'create')->name('produk.create');
        Route::post('store', 'store')->name('produk.store');
        Route::get('edit/{id}', 'edit')->name('produk.edit');
        Route::put('edit/{id}', 'update')->name('produk.update');
        Route::delete('destroy/{id}', 'destroy')->name('produk.destroy');
    });
    Route::controller(SupplierController::class)->prefix('supplier')->group(function () {
        Route::get('/', 'index')->name('supplier.index');
        Route::get('create', 'create')->name('supplier.create');
        Route::post('store', 'store')->name('supplier.store');
        Route::get('edit/{id}', 'edit')->name('supplier.edit');
        Route::put('edit/{id}', 'update')->name('supplier.update');
        Route::delete('destroy/{id}', 'destroy')->name('supplier.destroy');
    });
    Route::controller(PesananController::class)->prefix('pesanan')->group(function () {
        Route::get('/', 'index')->name('pesanan.index');
        Route::get('create', 'create')->name('pesanan.create');
        Route::post('store', 'store')->name('pesanan.store');
        Route::get('edit/{id}', 'edit')->name('pesanan.edit');
        Route::put('edit/{id}', 'update')->name('pesanan.update');
        Route::delete('destroy/{id}', 'destroy')->name('pesanan.destroy');
        Route::get('{id}/detail', 'show')->name('pesanan.detail');
        Route::post('{id}/terima', 'terima')->name('pesanan.terima');
        Route::post('{id}/tolak', 'tolak')->name('pesanan.tolak');
    });
    Route::controller(PengirimanController::class)->prefix('pengiriman')->group(function () {
        Route::get('/', 'index')->name('pengiriman.index');
        Route::get('create', 'create')->name('pengiriman.create');
        Route::post('store', 'store')->name('pengiriman.store');
        Route::get('edit/{id}', 'edit')->name('pengiriman.edit');
        Route::delete('destroy/{id}', 'destroy')->name('pengiriman.destroy');
    });
});

Route::controller(ShopController::class)->prefix('shop')->group(function () {
    Route::middleware(['auth', 'verified', 'user'])->group(function () {
        Route::get('{produk}/detail', 'detail')->name('shop.detail');
        Route::post('{produk_id}/order', 'order')->name('shop.order');
        Route::get('/', 'index')->name('shop.index');
    });
});

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::put('tiba/{id}', [PengirimanController::class, 'tiba'])->name('pengiriman.tiba');
    Route::controller(CartController::class)->prefix('shop')->group(function () {
        Route::get('cart', 'index')->name('cart');
        Route::post('cart', 'update')->name('cart.update');
        Route::delete('cart/{id}', 'destroy')->name('cart.destroy');
    });
    Route::controller(CheckoutController::class)->prefix('shop/checkout')->group(function () {
        Route::get('/{id}', 'index')->name('checkout.index');
        Route::post('/checkout', 'store')->name('checkout');
        Route::post('/bayar/{id}', 'bayar')->name('bayar');
    });
    Route::controller(OrderController::class)->prefix('order')->group(function () {
        Route::get('order', 'index')->name('order');
        Route::get('{id}/detail', 'show')->name('order.detail');
        Route::delete('order/{id}', 'destroy')->name('order.destroy');
    });
});

// Route::prefix('user')->group(function () {
//     Route::get('shop', function () {return view('user.pages.shop');})->name('shop');
//     Route::get('shop-details', function () {return view('user.pages.shop-details');})->name('shop-details');
//     Route::get('/cart', function () {return view('user.pages.shoping-cart');})->name('cart');
// });
