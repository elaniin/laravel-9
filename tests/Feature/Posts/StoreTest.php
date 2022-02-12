<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it stores a new post', function () {
    actingAsUser();

    $response = $this->post('/api/posts', [
        'title' => 'Example',
        'content' => 'Example of content',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'message',
        ]);

    $this->assertDatabaseHas('posts', [
        'title' => 'Example',
        'content' => 'Example of content',
        'status' => 'draft',
    ]);
});
