<?php

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideogameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('videogames', VideogameController::class);
    Route::resource('consoles', ConsoleController::class);
});

Route::get('/esercizio', function () {
    return view('esercizi.esercizio');
});

require __DIR__ . '/auth.php';
