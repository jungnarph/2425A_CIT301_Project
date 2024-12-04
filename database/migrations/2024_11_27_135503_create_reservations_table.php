<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_model_id');
            $table->datetime('pickup_dt'); 
            $table->string('pickup_location'); 
            $table->datetime('return_dt');
            $table->string('return_location');
            $table->boolean('has_insurance')->default(false);
            $table->unsignedInteger('total_amount')->default(10000);
            $table->boolean('is_paid')->default(false);
            $table->enum('status',['Pending', 'Confirmed', 'Canceled'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE reservations AUTO_INCREMENT = 100001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
