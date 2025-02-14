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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservationID');
            $table->foreignId('user_ID');
            $table->foreignId('room_ID');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->enum('availabilityDate', ['Occupied', 'Available'])->default('Available');
            $table->enum('reservationStatus', ['Check-in', 'Check-out', 'Book'])->default('Book');
            $table->timestamps();


            $table->foreign('user_ID')->references('userID')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('room_ID')->references('roomID')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
