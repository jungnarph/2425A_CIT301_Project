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
        Schema::create('rental_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->date('pickup_date'); 
            $table->time('pickup_time'); 
            $table->string('pickup_location'); 
            $table->date('return_date'); 
            $table->time('return_time'); 
            $table->string('return_location'); 
            $table->enum('status',['On Rent', 'Completed', 'Cancelled'])->default('Pending'); 
            $table->date('actual_return_date')->nullable();
            $table->time('actual_return_time')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_transactions');
    }
};
