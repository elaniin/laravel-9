<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it updates an existing user', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
    ]);

    actingAsUser();

    $response = $this->patch("/api/users/{$user->id}", [
        'email' => 'john@doe.dev',
    ], ['Accept' => 'application/json']);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
        ]);

    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@doe.dev',
    ]);
});
