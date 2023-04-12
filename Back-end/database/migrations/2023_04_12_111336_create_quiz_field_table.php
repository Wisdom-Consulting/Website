<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // rename table
        Schema::rename('quiz_field', 'quiz_fields');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // rename table
        Schema::rename('quiz_fields', 'quiz_field');
    }
};
