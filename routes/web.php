<?php

use App\Http\Controllers\KlantController;
use App\Http\Controllers\ProfileController;
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
});

// Voeg deze route toe ONDER de bestaande routes, buiten de auth-groep:
Route::get('/klanten', [KlantController::class, 'index'])
    ->middleware(['auth'])
    ->name('klanten.index');

Route::get('/klanten/{id}', [KlantController::class, 'show'])->name('klanten.show')->middleware('auth');
Route::get('/klanten/{id}/edit', [KlantController::class, 'edit'])->name('klanten.edit')->middleware('auth');
Route::post('/klanten/{id}/update', [KlantController::class, 'update'])->name('klanten.update')->middleware('auth');

require __DIR__.'/auth.php';
