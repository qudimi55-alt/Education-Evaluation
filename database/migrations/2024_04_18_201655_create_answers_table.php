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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restriction_id')->constrained('restrictions');
            $table->integer('student_id')->default(0);
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('evaluation_list_id')->constrained('evaluation_lists');
            $table->foreignId('question_id')->constrained('questions');
            $table->integer('head_id')->default(0);
            $table->text('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
