<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it shows an existing post of the user', function () {
    $user = User::factory()->create();
    $post = Post::factory()->for($user)->create();

    actingAsUser();

    $response = $this->get("/api/users/{$user->id}/posts/{$post->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'content',
                'created_at',
                'updated_at',
            ],
        ]);
});

test('it fails to show a post of someone else', function () {
    $users = User::factory(2)->create();
    $post = Post::factory()->for($users->get(0))->create();

    actingAsUser();

    $this->expectException(ModelNotFoundException::class);

    $response = $this->get("/api/users/{$users->get(1)->id}/posts/{$post->id}");
});
