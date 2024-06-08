<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteUserRequest;

class UserController extends Controller
{
    public function index() {
        $usersWithoutRole = User::whereDoesntHave('roles', function($query){
            $query->whereIn('name', ['admin', 'staff']);
        })->get();
        
        return $usersWithoutRole;
    }

    public function destroy(DeleteUserRequest $request, User $user){
        $user->delete();
        return response()->json(['message' => 'User Removed Successfully'],200);
    }
}
