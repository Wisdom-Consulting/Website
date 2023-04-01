<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Chat;
use App\Models\ChatParticipant;
use App\Models\Content;
use App\Models\Message;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(3)->create();

    }
}
