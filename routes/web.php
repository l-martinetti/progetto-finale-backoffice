<?php

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideogameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('videogames', VideogameController::class)->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('videogame', VideogameController::class);
    Route::resource('console', ConsoleController::class);
});

require __DIR__ . '/auth.php';
