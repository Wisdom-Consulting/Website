<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Chat;
use App\Models\ChatParticipant;
use App\Models\Content;
use App\Models\Message;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Chat::factory(10)->create();
         Content::factory(10)->create();
         Question::factory(10)->create();
         Quiz::factory(10)->create();
         Message::factory(10)->create();
         Category::factory(3)->create();
         Answer::factory(10)->create();
         ChatParticipant::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
