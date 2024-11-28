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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->datetime('pickup_dt')->nullable(); 
            $table->string('pickup_location')->nullable();
            $table->datetime('return_dt')->nullable();
            $table->string('return_location')->nullable();
            $table->boolean('has_insurance')->default(false);
            $table->unsignedInteger('total_amount')->default(10000);
            $table->enum('status',['Pending', 'Active', 'Completed', 'Missing'])->default('Pending');
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
