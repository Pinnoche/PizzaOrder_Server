<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
=======
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> origin/main

class RegisteredUserController extends Controller
{
    /**
<<<<<<< HEAD
=======
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
>>>>>>> origin/main
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
<<<<<<< HEAD
    public function store(Request $request): Response
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  'min:8'],
            'c_password' => 'required | same:password'
        ]);

        $user = User::create([
            'username' => $request->username,
=======
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
>>>>>>> origin/main
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

<<<<<<< HEAD
        return response()->noContent();
=======
        return redirect(route('dashboard', absolute: false));
>>>>>>> origin/main
    }
}
