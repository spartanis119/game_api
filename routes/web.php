<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

// Route::inertia('/', 'Welcome', [
//     'canRegister' => Features::enabled(Features::registration()),
// ])->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::inertia('dashboard', 'Dashboard')->name('dashboard');
// });
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('games')->name('games.')->group(function () {
    Route::get('/lol', [GamesController::class, 'showLol'])->name('lol');
    Route::get('/valorant', [GamesController::class, 'showValorant'])->name('valorant');
    Route::get('/pokemon', [GamesController::class, 'showPokemon'])->name('pokemon');
});


require __DIR__.'/settings.php';
