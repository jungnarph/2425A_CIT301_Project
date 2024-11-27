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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('model_name')->unique();
            $table->text('description');
            $table->unsignedBigInteger('type_id');
            $table->unsignedMediumInteger('base_price');
            $table->tinyInteger('seat_capacity')->unsigned();
            $table->string('transmission_type');
            $table->string('layout_type');
            $table->string('engine');
            $table->string('power');
            $table->string('torque');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('car_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
