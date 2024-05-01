<?php

use App\Models\User;

<<<<<<< HEAD
=======
test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

>>>>>>> origin/main
test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
<<<<<<< HEAD
    $response->assertNoContent();
=======
    $response->assertRedirect(route('dashboard', absolute: false));
>>>>>>> origin/main
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
<<<<<<< HEAD
    $response->assertNoContent();
=======
    $response->assertRedirect('/');
>>>>>>> origin/main
});
