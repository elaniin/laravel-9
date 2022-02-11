<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it updates an existing post', function () {
    $post = Post::factory()->for(User::factory()->create())->create([
        'title' => 'Example',
        'content' => 'Example of content',
    ]);

    actingAsUser();

    $response = $this->patch("/api/posts/{$post->id}", [
        'title' => 'New title',
        'content' => 'New content',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
        ]);

    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'New title',
        'content' => 'New content',
    ]);
});
