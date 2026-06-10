<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect('/menus');
});

// LOGIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// HALAMAN CUSTOMER
Route::get('/menus', [CartController::class, 'menu'])->name('customer.menu');
Route::post('/cart/add/{menu}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// CHECKOUT TRANSAKSI CUSTOMER
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success/{order}', [OrderController::class, 'success'])->name('checkout.success');

// ADMIN (WAJIB LOGIN)
Route::middleware('auth')->group(function () {

    // CRUD MENU
    Route::resource('admin/menus', MenuController::class);

    // DAFTAR PESANAN
    Route::get('/admin/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/admin/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');

    // INPUT TRANSAKSI MANUAL
    Route::get('/admin/transaksi/create', [TransactionController::class, 'create'])
        ->name('transactions.create');

    Route::post('/admin/transaksi/store', [TransactionController::class, 'store'])
        ->name('transactions.store');
});