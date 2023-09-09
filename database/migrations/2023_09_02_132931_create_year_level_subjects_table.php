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
        Schema::create('year_level_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('year_level_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();
            $table->foreign('year_level_id')->references('id')->on('year_levels')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_level_subjects');
    }
};
