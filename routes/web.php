<?php

use App\Http\Controllers\ProfileController;
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
});

Route::get('/allergie/overzicht', [AllergieController::class, 'overzicht'])->name('allergie.overzicht');
Route::get('/allergie/{id}/edit', [AllergieController::class, 'edit'])->name('allergie.edit');
Route::put('/allergie/{id}', [AllergieController::class, 'update'])->name('allergie.update');


require __DIR__.'/auth.php';
