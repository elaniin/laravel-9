<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it shows an existing post', function () {
    $post = Post::factory()->for(User::factory()->create())->create();

    actingAsUser();

    $response = $this->get("/api/posts/{$post->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'content',
                'status',
                'created_at',
                'updated_at',
            ],
        ]);
});
