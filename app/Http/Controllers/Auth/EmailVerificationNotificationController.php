<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\JsonResponse;
=======
>>>>>>> origin/main
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
<<<<<<< HEAD
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('/dashboard');
=======
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
>>>>>>> origin/main
        }

        $request->user()->sendEmailVerificationNotification();

<<<<<<< HEAD
        return response()->json(['status' => 'verification-link-sent']);
=======
        return back()->with('status', 'verification-link-sent');
>>>>>>> origin/main
    }
}
