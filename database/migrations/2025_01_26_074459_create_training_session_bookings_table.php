<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('training_session_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('training_session_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('confirmed');
            $table->timestamps();

            // Prevent duplicate bookings
            $table->unique(['user_id', 'training_session_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_session_bookings');
    }
};