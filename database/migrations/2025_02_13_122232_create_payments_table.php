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
            $table->id('paymentID');
            $table->foreignId('reservation_ID');
            $table->decimal('totalAmount');
            $table->decimal('paymentDeposit');
            $table->decimal('paymentAmount');
            $table->enum('paymentStatus', ['Pending', 'Paid']);
            $table->string('paymentMethod');
            $table->string('paymentReference')->unique();
            $table->string('paymentImage');
            $table->timestamps();


            $table->foreign('reservation_ID')->references('reservationID')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
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
