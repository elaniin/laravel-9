<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it lists posts with the given status', function () {
    $user = User::factory()->create();

    Post::factory(25)->for($user)->published()->create();
    Post::factory(25)->for($user)->drafted()->create();

    actingAsUser();

    $this->get('/api/post-status/draft')
        ->assertStatus(200)
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
        ])
        ->assertJsonCount(25, 'data');

    $this->get('/api/post-status/publish')
        ->assertStatus(200)
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
        ])
        ->assertJsonCount(25, 'data');
});
