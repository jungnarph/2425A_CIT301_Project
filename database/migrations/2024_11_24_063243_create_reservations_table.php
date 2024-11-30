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
<<<<<<< Updated upstream:database/migrations/2024_11_24_063243_create_reservations_table.php
            $table->string('status'); 
=======
            $table->enum('status',['On Rent', 'Completed', 'Cancelled']);
            $table->date('actual_return_date')->nullable();
            $table->time('actual_return_time')->nullable();
            $table->timestamps();
>>>>>>> Stashed changes:database/migrations/2024_11_25_123830_create_rental_transactions_table.php

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
