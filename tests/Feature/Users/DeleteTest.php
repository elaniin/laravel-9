<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it deletes an existing user', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
    ]);

    actingAsUser();

    $response = $this->delete("/api/users/{$user->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
        ]);

    $this->assertDatabaseMissing('users', [
        'id' => $user->id,
    ]);
});
