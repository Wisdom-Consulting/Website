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
            // drop foreign key
            $table->dropForeign(['quiz_fields_id']);
            // drop column
            $table->dropColumn('quiz_fields_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            // add column
            $table->unsignedBigInteger('quiz_fields_id');
            // add foreign key
            $table->foreign('quiz_fields_id')->references('id')->on('quiz_fields');
        });
    }
};
