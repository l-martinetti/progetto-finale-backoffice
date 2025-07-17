<?php

use App\Http\Controllers\Api\ConsoleController;
use App\Http\Controllers\Api\VideogameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/videogames', [VideogameController::class, 'index']);
Route::get('/videogames/{id}', [VideogameController::class, 'show']);

Route::get('consoles', [ConsoleController::class, 'index']);
Route::get('consoles/{id}', [ConsoleController::class, 'show']);