<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserProfileController;

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
 Route::get('/user/pizzas', [UserProfileController::class, 'index'])->middleware('auth');

Route::prefix('pizzas')->middleware('auth')->group(function () {
    Route::get('/', [PizzaController::class, 'index']);
    Route::post('/', [PizzaController::class, 'store']);
    Route::get('/{pizza}', [PizzaController::class, 'show']);
    Route::get('/{pizza}/edit', [PizzaController::class, 'edit']);
    Route::patch('/{pizza}/edit', [PizzaController::class, 'update']);
    Route::delete('/{pizza}/delete', [PizzaController::class, 'destroy']);
});


