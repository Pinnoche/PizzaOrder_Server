<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

<<<<<<< HEAD
=======
test('reset password link screen can be rendered', function () {
    $response = $this->get('/forgot-password');

    $response->assertStatus(200);
});

>>>>>>> origin/main
test('reset password link can be requested', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post('/forgot-password', ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class);
});

<<<<<<< HEAD
=======
test('reset password screen can be rendered', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post('/forgot-password', ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
        $response = $this->get('/reset-password/'.$notification->token);

        $response->assertStatus(200);

        return true;
    });
});

>>>>>>> origin/main
test('password can be reset with valid token', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post('/forgot-password', ['email' => $user->email]);

<<<<<<< HEAD
    Notification::assertSentTo($user, ResetPassword::class, function (object $notification) use ($user) {
=======
    Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
>>>>>>> origin/main
        $response = $this->post('/reset-password', [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response
            ->assertSessionHasNoErrors()
<<<<<<< HEAD
            ->assertStatus(200);
=======
            ->assertRedirect(route('login'));
>>>>>>> origin/main

        return true;
    });
});
