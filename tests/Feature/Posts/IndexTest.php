<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it lists posts', function () {
    Post::factory(50)->for(User::factory()->create())->create();

    actingAsUser();

    $response = $this->get('/api/posts');

    $response->assertStatus(200)
        ->assertJsonCount(50, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'content',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
});
