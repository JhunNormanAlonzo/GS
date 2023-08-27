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
        Schema::create('modify_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requestor_id');
            $table->unsignedBigInteger('actor_id')->nullable();
            $table->unsignedBigInteger('collection_id');
            $table->text('remarks');
            $table->json('original');
            $table->json('changes')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('seen')->default(false);
            $table->boolean('modified')->default(false);
            $table->timestamps();
            $table->foreign('requestor_id')->references('id')->on('users');
            $table->foreign('actor_id')->references('id')->on('users');
            $table->foreign('collection_id')->references('id')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modify_requests');
    }
};
