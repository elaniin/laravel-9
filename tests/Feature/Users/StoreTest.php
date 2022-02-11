<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it stores a new user', function () {
    $response = $this->post('/api/users', [
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => 'Secret$1234',
    ], ['Accept' => 'application/json']);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'message',
        ]);

    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@doe.com',
    ]);
});
