Route::middleware('auth')->group(function () {
    // ...existing code...
    Route::get('/voedselpakketen/{pakket}/edit', [\App\Http\Controllers\VoedselpakketController::class, 'edit'])->name('voedselpakketen.edit');
    Route::put('/voedselpakketen/{pakket}', [\App\Http\Controllers\VoedselpakketController::class, 'update'])->name('voedselpakketen.update');
});
<?php

use App\Http\Controllers\KlantController;
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
    Route::get('/overzicht-voedselpakketen', [\App\Http\Controllers\VoedselpakketController::class, 'overzicht'])->name('voedselpakketen.overzicht');
    Route::get('/voedselpakketen/{id}/details', [\App\Http\Controllers\VoedselpakketController::class, 'details'])->name('voedselpakketen.details');
    Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leveranciers.index');
    Route::get('/leveranciers/{leverancier}/producten', [ProductController::class, 'index'])->name('producten.index');
    Route::get('/producten/{ppid}/edit', [ProductController::class, 'edit'])->name('producten.edit');
    Route::put('/producten/{ppid}', [ProductController::class, 'update'])->name('producten.update');
});


// Voeg deze route toe ONDER de bestaande routes, buiten de auth-groep:
Route::get('/klanten', [KlantController::class, 'index'])
    ->middleware(['auth'])
    ->name('klanten.index');

Route::get('/klanten/{id}', [KlantController::class, 'show'])->name('klanten.show')->middleware('auth');
Route::get('/klanten/{id}/edit', [KlantController::class, 'edit'])->name('klanten.edit')->middleware('auth');
Route::post('/klanten/{id}/update', [KlantController::class, 'update'])->name('klanten.update')->middleware('auth');

Route::get('/allergie/overzicht', [AllergieController::class, 'overzicht'])->name('allergie.overzicht');
Route::get('/allergie/{id}/edit', [AllergieController::class, 'edit'])->name('allergie.edit');
Route::put('/allergie/{id}', [AllergieController::class, 'update'])->name('allergie.update');
Route::get('/allergie/details/{id}', [App\Http\Controllers\AllergieController::class, 'details'])->name('allergie.details');
Route::put('/allergie/details/{id}', [App\Http\Controllers\AllergieController::class, 'updateDetails'])->name('allergie.details.update');

// Geen dubbele of foutieve route meer voor overzicht-voedselpakketen


require __DIR__.'/auth.php';
