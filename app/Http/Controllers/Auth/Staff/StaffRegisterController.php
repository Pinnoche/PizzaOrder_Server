<?php

namespace App\Http\Controllers\Auth\Staff;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class StaffRegisterController extends Controller
{
      //registration  function
      public function store(Request $request): Response {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  'min:8'],
            'confirm_password' => 'required | same:password'
        ]);
        if(Auth::user()->hasRole('admin')){
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])->assignRole('staff');
        }
        

        event(new Registered($user));
        Auth::login($user);

        return response()->noContent();
    }
}
