<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    $user = $request->user();
    if(!$user->hasRole(['admin', 'staff'])){
        return response()->json($user);
    } 
});

Route::middleware(['auth:sanctum'])->get('/admin', function (Request $request) {
   $user = $request->user();
    if ($user->hasRole('admin')) {
        return response()->json($user);
    }
});

Route::middleware(['auth:sanctum'])->get('/staff', function (Request $request) {
    $user = $request->user();
     if ($user->hasRole('staff')) {
         return response()->json($user);
     }
 });
 Route::get('/user/pizzas', [UserController::class, 'index'])->middleware('auth');

Route::group(['middleware' =>'auth'],function () {
    Route::get('/pizzas', [PizzaController::class, 'index']);
    Route::post('/pizzas', [PizzaController::class, 'store']);
    Route::get('/pizzas/{pizza}', [PizzaController::class, 'show']);
    Route::get('/pizzas/{pizza}/edit', [PizzaController::class, 'edit']);
    Route::patch('/pizzas/{pizza}/edit', [PizzaController::class, 'update']);
    Route::delete('/pizzas/{pizza}/delete', [PizzaController::class, 'destroy'])->middleware(['role:admin', 'role:staff']);
});


