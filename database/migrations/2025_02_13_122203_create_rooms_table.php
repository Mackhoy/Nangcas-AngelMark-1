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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('roomID');
            $table->foreignId('user_ID');
            $table->string('roomType')->unique();
            $table->integer('roomNumber')->unique();
            $table->string('description')->nullable();
            $table->float('price')->unique();
            $table->string('image')->nullable();
            $table->timestamps();


            $table->foreign('user_ID')->references('userID')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
