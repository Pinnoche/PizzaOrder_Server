<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pizzas', [PizzaController::class, 'index'])->middleware('auth');
Route::post('/pizzas', [PizzaController::class, 'store']);
Route::get('/pizzas/{id}', [PizzaController::class, 'show']);
Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit']);
Route::patch('/pizzas/{id}/edit', [PizzaController::class, 'update']);
Route::delete('/pizzas/{id}/delete', [PizzaController::class, 'destroy']);
