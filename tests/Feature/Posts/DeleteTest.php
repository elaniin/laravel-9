<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it deletes an existing post', function () {
    $post = Post::factory()->for(User::factory()->create())->create();

    actingAsUser();

    $response = $this->delete("/api/posts/{$post->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
        ]);

    $this->assertDatabaseMissing('posts', [
        'id' => $post->id,
    ]);
});
