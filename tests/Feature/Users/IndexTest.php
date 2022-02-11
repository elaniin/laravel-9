<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it lists existing users', function () {
    User::factory(50)->create();

    actingAsUser();

    $response = $this->get('/api/users');

    $response->assertStatus(200)
        ->assertJsonCount(51, 'data'); // 50 + authenticated
});
