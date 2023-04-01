<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\ChatParticipant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ChatParticipant>
 */
class ChatParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chat_session_id' => Chat::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
