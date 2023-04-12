<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Quiz;
use App\Models\Score;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Score>
 */
class UserQuizScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'quiz_id' => Quiz::all()->random()->id,
            'score' => $this->faker->numberBetween(1, 100),
        ];
    }
}
