<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MangaController::class, 'index'])->name('home');
Route::get('/shop', [MangaController::class, 'shop'])->name('shop');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/shop/all', [SearchController::class, 'all'])->name('shop.all');
Route::get('/shop/latest', [SearchController::class, 'latest'])->name('shop.latest');
Route::get('/shop/longest', [SearchController::class, 'longest'])->name('shop.longest');
Route::get('/shop/least-expencive', [SearchController::class, 'leastExpencive'])->name('shop.leastexpencive');
Route::get('/shop/{id}', [MangaController::class, 'getItem'])->name('shop.item');

//Cart
Route::get('add-to-cart/{id}/{chapter}/{quantity}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/remove-from-cart/{key}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/finalize-order', [OrderController::class, 'create'])->name('order.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //admin
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/create-manga', [AdminController::class, 'create'])->name('admin.manga.create');
        Route::get('/admin/manga/{id}/edit', [AdminController::class, 'edit'])->name('admin.manga.edit');
        Route::post('/admin/store-manga', [AdminController::class, 'storeManga'])->name('admin.manga.store');
        Route::post('/admin/update-manga', [AdminController::class, 'update'])->name('admin.manga.update');
        Route::post('/admin/delete-manga', [AdminController::class, 'delete'])->name('admin.manga.delete');

        //orders
        Route::get('/admin/orders', [AdminController::class, 'ordersPage'])->name('admin.ordersPage');
        Route::post('/admin/orders', [AdminController::class, 'updateStatus'])->name('admin.orders.update');
    });
});

require __DIR__ . '/auth.php';
