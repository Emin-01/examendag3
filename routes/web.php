<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GezinController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AllergieController;
use Illuminate\Support\Facades\Route;
use App\Models\Allergie;
use App\Models\Gezin;


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
    Route::get('/overzicht-voedselpakketen', [GezinController::class, 'index'])->name('voedselpakketen.overzicht');
    Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leveranciers.index');
    Route::get('/leveranciers/{leverancier}/producten', [ProductController::class, 'index'])->name('producten.index');
    Route::get('/producten/{ppid}/edit', [ProductController::class, 'edit'])->name('producten.edit');
    Route::put('/producten/{ppid}', [ProductController::class, 'update'])->name('producten.update');
});

Route::get('/allergie/overzicht', [AllergieController::class, 'overzicht'])->name('allergie.overzicht');
Route::get('/allergie/{id}/edit', [AllergieController::class, 'edit'])->name('allergie.edit');
Route::put('/allergie/{id}', [AllergieController::class, 'update'])->name('allergie.update');
Route::get('/allergie/details/{id}', [App\Http\Controllers\AllergieController::class, 'details'])->name('allergie.details');
Route::put('/allergie/details/{id}', [App\Http\Controllers\AllergieController::class, 'updateDetails'])->name('allergie.details.update');

// Geen dubbele of foutieve route meer voor overzicht-voedselpakketen

require __DIR__.'/auth.php';
