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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('plate_number')->unique();
            $table->text('description');
            $table->unsignedMediumInteger('base_price');
            $table->boolean('is_available')->default(true);
            $table->string('engine');
            $table->string('power');
            $table->string('torque');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('car_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
