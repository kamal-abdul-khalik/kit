<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first(),
            'teaser' => fake()->sentence(10),
            'title' => $title = fake()->unique()->sentence(6),
            'slug' => str()->slug($title),
            'body' => fake()->paragraph(5),
            'published' => fake()->boolean(),
            'views' => fake()->numberBetween(0, 1000),
        ];
    }
}
