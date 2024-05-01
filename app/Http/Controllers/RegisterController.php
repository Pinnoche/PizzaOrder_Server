<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:200|unique:users',
            'email' => 'required|string|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password'
        ]);

      if($validator->fails()){
        return response()->json([
            'status' => '422',
            'errors' => $validator->messages()
        ], 422);
      } 
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if($user){
            return response()->json([
                'status' => 200,
                'message' => 'Registration Successfull'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Somethng Went Wrong'
            ], 500);
           }

    }
}
