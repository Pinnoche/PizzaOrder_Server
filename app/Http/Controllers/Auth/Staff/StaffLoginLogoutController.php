<?php

namespace App\Http\Controllers\Auth\Staff;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class StaffLoginLogoutController extends Controller
{
     public function store(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))){
            if (Auth::user()->hasRole('staff')) {
                $request->session()->regenerate(); 
                return response()->noContent(); 
            }
            return response()->json(['message' => 'Not a Staff'],404);
        }
    
    }

    public function destroy(Request $request): Response {
        if(Auth::check() && Auth::user()->hasRole('staff')){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->noContent(); 
        }
        
    }
}
