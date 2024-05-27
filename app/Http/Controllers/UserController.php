<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        if(auth()->check()){
            $user = auth()->user();
            $pizzas = $user->pizzas()->get();
        }
        return response()->json(['pizzas' => $pizzas],200);
    }
}
