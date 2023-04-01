<?php

namespace Database\Seeders;

use App\Models\ChatParticipant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatParticipant::factory(10)->create();
    }
}
