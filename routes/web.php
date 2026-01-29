<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\HistoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Event routes
Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show');

// Admin routes
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Category Management
    Route::resource('categories', CategoryController::class);

    // Event Management
    Route::resource('events', EventController::class);

    // Tiket Management
    Route::resource('tickets', TiketController::class);

    // Histories
    Route::get('/histories', [HistoriesController::class, 'index'])->name('histories.index');
    Route::get('/histories/{id}', [HistoriesController::class, 'show'])->name('histories.show');

    // Lokasi Management
    Route::resource('lokasi', \App\Http\Controllers\Admin\LokasiController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Order ticket
    Route::post('/order/{tiket}', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
});

require __DIR__ . '/auth.php';
