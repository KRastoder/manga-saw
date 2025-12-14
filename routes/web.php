<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/',[MangaController::class , 'index'])->name('home');
Route::get('/shop',[MangaController::class , 'shop'])->name('shop');

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
    });
});

require __DIR__ . '/auth.php';
