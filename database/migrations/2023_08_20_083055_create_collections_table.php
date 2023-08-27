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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cashier_id')->nullable();
            $table->string('user')->nullable();
            $table->date('collection_date')->nullable();
            $table->string('shift')->nullable();
            $table->string('cashier')->nullable();
            $table->decimal('gross', 10, 2)->nullable();
            $table->decimal('paid_in', 10, 2)->nullable();
            $table->decimal('purchase_order', 10, 2)->nullable();
            $table->decimal('paid_out', 10, 2)->nullable();
            $table->decimal('redeem', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('lubes', 10, 2)->nullable();
            $table->decimal('net', 10, 2)->nullable();
            $table->decimal('cheque', 10, 2)->nullable();
            $table->decimal('cash_on_hand', 10, 2)->nullable();
            $table->decimal('short_over', 10, 2)->nullable();
            $table->boolean('editable')->default(false);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cashier_id')->references('id')->on('cashiers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
