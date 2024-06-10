<?php

namespace App\Http\Controllers\Auth\Staff;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index() {
        $staffRole = Role::where('name', 'staff')->first();

        $staff = $staffRole->users()->get();

        return $staff;
        
    }
    
    public function destroy(DeleteUserRequest $request, User $user){
        $user->delete();
        return response()->json(['message' => 'User Removed Successfully'],200);
    }
}
