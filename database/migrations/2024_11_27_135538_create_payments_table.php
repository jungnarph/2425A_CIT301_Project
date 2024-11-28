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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_reference')->unique();
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->unsignedBigInteger('rental_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('amount');
            $table->enum('payment_method',['Cash', 'Credit/Debit Card', 'Bank Transfer']);
            $table->string('payment_details');
            $table->timestamps();
            
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
