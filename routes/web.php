<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta suma
Route::get('/suma/{num1}/{num2}', [CalculadoraController::class, 'suma']);

// Ruta resta
Route::get('/resta/{num1}/{num2}', [CalculadoraController::class, 'resta']);

// Ruta multiplicación
Route::get('/multiplicacion/{num1}/{num2}', [CalculadoraController::class, 'multiplicacion']);

// Ruta división
Route::get('/division/{num1}/{num2}', [CalculadoraController::class, 'division']);

// Ruta exponencial
Route::get('/exponencial/{num1}/{num2}', [CalculadoraController::class, 'exponencial']);

// Ruta Users
Route::resource('users', UserController::class);