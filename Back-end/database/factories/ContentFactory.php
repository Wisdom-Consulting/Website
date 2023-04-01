<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id
        ];
    }
}
