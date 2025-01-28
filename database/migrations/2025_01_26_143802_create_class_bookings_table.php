<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('class_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('class_id')->constrained('fitness_classes')->onDelete('cascade');
            $table->string('status')->default('confirmed');
            $table->timestamp('booking_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_bookings');
    }
}
