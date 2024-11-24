<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->Increments('transaction_id'); // Primary key
            $table->unsignedInteger('user_id'); // Foreign key
            $table->unsignedBigInteger('car_id'); // Foreign key
            $table->date('pickup_date'); 
            $table->time('pickup_time'); 
            $table->string('pickup_location'); 
            $table->date('return_date'); 
            $table->time('return_time'); 
            $table->string('return_location'); 
            $table->string('status'); 

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
        });
    }
};