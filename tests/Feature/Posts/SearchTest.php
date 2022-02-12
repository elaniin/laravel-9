<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it search for posts', function () {
    $posts = Post::factory(50)->for(User::factory()->create())->create();

    $randomPost = $posts->random();
    $postWords = explode(' ', $randomPost->content);
    $randomWord = $postWords[array_rand($postWords)];

    $response = $this->get("/api/posts/search?q=$randomWord");

    $response->assertStatus(200)
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

test('it search for posts with scout', function () {
    $posts = Post::factory(50)->for(User::factory()->create())->create();

    $randomPost = $posts->random();
    $postWords = explode(' ', $randomPost->content);
    $randomWord = $postWords[array_rand($postWords)];

    $response = $this->get("/api/posts/search-scout?q=$randomWord");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'title',
                    'content',
                ],
            ],
        ]);
});
