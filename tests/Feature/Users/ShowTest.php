<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it shows an existing user', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
    ]);

    $response = $this->get("/api/users/{$user->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ],
        ]);
});