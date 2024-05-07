<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(PizzaController::class)->group(function () {
    Route::get('/pizzas', 'index')->middleware('auth');
    Route::post('/pizzas', 'store');
    Route::get('/pizzas/{id}', 'show');
    Route::get('/pizzas/{id}/edit', 'edit');
    Route::patch('/pizzas/{id}/edit', 'update');
    Route::delete('/pizzas/{id}/delete', 'destroy')->middleware('auth');
});
