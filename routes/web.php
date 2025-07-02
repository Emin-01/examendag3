<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\AllergieController;
use App\Http\Controllers\VoedselpakketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes die authenticatie vereisen
Route::middleware('auth')->group(function () {

    // Profielbeheer
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Voedselpakketten
    Route::get('/overzicht-voedselpakketen', [VoedselpakketController::class, 'overzicht'])->name('voedselpakketen.overzicht');
    Route::get('/voedselpakketen/{id}/details', [VoedselpakketController::class, 'details'])->name('voedselpakketen.details');
    Route::get('/voedselpakketen/{pakket}/edit', [VoedselpakketController::class, 'edit'])->name('voedselpakketen.edit');
    Route::put('/voedselpakketen/{pakket}', [VoedselpakketController::class, 'update'])->name('voedselpakketen.update');

    // Leveranciers en producten
    Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leveranciers.index');
    Route::get('/leveranciers/{leverancier}/producten', [ProductController::class, 'index'])->name('producten.index');
    Route::get('/producten/{ppid}/edit', [ProductController::class, 'edit'])->name('producten.edit');
    Route::put('/producten/{ppid}', [ProductController::class, 'update'])->name('producten.update');

    // Klanten
    Route::get('/klanten', [KlantController::class, 'index'])->name('klanten.index');
    Route::get('/klanten/{id}', [KlantController::class, 'show'])->name('klanten.show');
    Route::get('/klanten/{id}/edit', [KlantController::class, 'edit'])->name('klanten.edit');
    Route::post('/klanten/{id}/update', [KlantController::class, 'update'])->name('klanten.update');

    // Allergieën
    Route::get('/allergie/overzicht', [AllergieController::class, 'overzicht'])->name('allergie.overzicht');
    Route::get('/allergie/{id}/edit', [AllergieController::class, 'edit'])->name('allergie.edit');
    Route::put('/allergie/{id}', [AllergieController::class, 'update'])->name('allergie.update');
    Route::get('/allergie/details/{id}', [AllergieController::class, 'details'])->name('allergie.details');
    Route::put('/allergie/details/{id}', [AllergieController::class, 'updateDetails'])->name('allergie.details.update');
});

require __DIR__.'/auth.php';
