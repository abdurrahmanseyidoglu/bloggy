<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition(): array
    {
        $title = fake()->realText(30);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => fake()->imageUrl,
            'body' => fake()->text(1000),
            'active' => fake()->boolean,
            'published_at' => fake()->dateTime,
            'user_id' => 1,
        ];
    }
}
