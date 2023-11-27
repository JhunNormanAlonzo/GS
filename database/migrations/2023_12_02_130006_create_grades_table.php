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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_student_id');
            $table->unsignedBigInteger('school_year_id');
            $table->unsignedBigInteger('year_level_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('subject_id');
            $table->double('first_grading', 8,2)->nullable();
            $table->double('second_grading', 8,2)->nullable();
            $table->double('third_grading', 8,2)->nullable();
            $table->double('fourth_grading', 8,2)->nullable();
            $table->double('average', 8,2)->nullable();
            $table->timestamps();
            $table->foreign('teacher_student_id')->references('id')->on('teacher_students')->onDelete('cascade');
            $table->foreign('year_level_id')->references('id')->on('year_levels')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
