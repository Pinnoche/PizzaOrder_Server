<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function check(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required |string | max:200',
            'password' => ['required', 'string'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => '422',
                'errors' => $validator->messages()
            ], 422);
        }
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => '401',
                'Unauthorized' => [
                    'error'=> 'Unauthorized'
                ]
            ],401);

            } else {
                return response()->json([
                    'status' => '200',
                    'message' => 'Login Succesfull'
                ], 200);
            }
    }
}
