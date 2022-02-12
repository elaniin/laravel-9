<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, string>
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
        ];
    }

    /**
     * Indicate that the post is drafted.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function drafted()
    {
        return $this->state(function () {
            return [
                'status' => PostStatus::Draft,
            ];
        });
    }

    /**
     * Indicate that the post is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function published()
    {
        return $this->state(function () {
            return [
                'status' => PostStatus::Published,
            ];
        });
    }
}
