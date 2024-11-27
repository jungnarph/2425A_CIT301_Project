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
        Schema::create('rental_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_model_id');
            $table->date('pickup_dt'); 
            $table->string('pickup_location'); 
            $table->datetime('return_dt'); 
            $table->string('return_location');
            $table->enum('status',['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
        });

        DB::statement("
            CREATE TRIGGER prevent_status_edit
            BEFORE UPDATE ON rental_requests
            FOR EACH ROW
            BEGIN
                IF OLD.status != 'Pending' THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Status has already been updated and cannot be edited again.';
                END IF;
            END
        ");

        DB::statement("
            CREATE TRIGGER prevent_duplicate_pending_request
            BEFORE INSERT ON rental_requests
            FOR EACH ROW
            BEGIN
                -- Check if there are any existing requests for the same car and user that are still pending
                IF EXISTS (
                    SELECT 1
                    FROM rental_requests
                    WHERE user_id = NEW.user_id
                    AND status = 'Pending'
                ) THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'You cannot make a new request until the previous request is approved or rejected.';
                END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_requests');
    }
};
