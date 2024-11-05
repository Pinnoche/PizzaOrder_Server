<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Resources\Resources\PizzaResource;

class UserProfileController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $pizzas = PizzaResource::collection($user->pizzas()->get());
        }
        return response()->json(compact('user', 'pizzas'));
    }
}
