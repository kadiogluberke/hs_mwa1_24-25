<?php

test('there is no register route', function () {
    $response = $this->get('/register');

    $response->assertStatus(404);
});

// test('new users can register', function () {
//     $response = $this->post('/register', [
//         'name' => 'Test User',
//         'email' => 'test@example.com',
//         'password' => 'password',
//         'password_confirmation' => 'password',
//     ]);

//     $this->assertAuthenticated();
//     $response->assertRedirect(route('dashboard', absolute: false));
// });
