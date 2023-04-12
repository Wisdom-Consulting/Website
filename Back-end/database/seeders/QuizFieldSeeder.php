<?php

namespace Database\Seeders;

use App\Models\QuizField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuizField::factory()->count(10)->create();
    }
}
