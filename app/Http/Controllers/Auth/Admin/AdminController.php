<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    //login function 
    public function store(Request $request ) {
        if(Auth::attempt($request->only('email', 'password'))){
            if (Auth::user()->hasRole('admin')) {
                $request->session()->regenerate(); 
                return response()->noContent();  
            }
            return response()->json(['message' => 'Not an Admin'],404);
        }
    
    }


    //logout function
    public function destroy(Request $request) {
        if(Auth::check() && Auth::user()->hasRole('admin')){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->noContent(); 
        }
        
    }
}
