<?php

namespace Database\Seeders;

use App\Models\UserQuizScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserQuizScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserQuizScore::factory()->count(10)->create();
    }
}
