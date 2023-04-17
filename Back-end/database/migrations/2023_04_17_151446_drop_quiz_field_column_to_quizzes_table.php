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
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign(['quiz_field']);
            $table->dropColumn('quiz_field');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->unsignedBigInteger('quiz_field')->nullable();
            $table->foreign('quiz_field')->references('id')->on('quiz_fields');
        });
    }
};
