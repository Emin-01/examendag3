<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leveranciers.index');
    Route::get('/leveranciers/{leverancier}/producten', [ProductController::class, 'index'])->name('producten.index');
    Route::get('/producten/{product}/edit', [ProductController::class, 'edit'])->name('producten.edit');
    Route::put('/producten/{product}', [ProductController::class, 'update'])->name('producten.update');
});

require __DIR__.'/auth.php';
