<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Automatically creates an 'id' column as the primary key
            $table->foreignId('car_id')->constrained()->onDelete('cascade'); // Foreign key for the car
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('pickup_location');
            $table->date('return_date');
            $table->time('return_time');
            $table->string('return_location');
            $table->timestamps(); // Created at and updated at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
