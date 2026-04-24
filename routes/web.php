<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return redirect('/menus');
});

// HALAMAN CUSTOMER
Route::get('/menus', [CartController::class, 'menu'])->name('customer.menu');
Route::post('/cart/add/{menu}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// CHECKOUT TRANSAKSI
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success/{order}', [OrderController::class, 'success'])->name('checkout.success');

// ADMIN CRUD MENU
Route::resource('admin/menus', MenuController::class);

// ADMIN LIHAT PESANAN
Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/admin/orders/{order}', [OrderController::class, 'show'])->name('orders.show');