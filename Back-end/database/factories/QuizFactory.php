<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Quiz;
use App\Models\QuizField;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Quiz>
 */
class QuizFactory extends Factory
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
            'level_id' => Level::all()->random()->id,
            'quiz_field_id' => QuizField::all()->random()->id,
        ];
    }
}
