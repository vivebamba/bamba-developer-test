<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriumSeatScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditorium_seat_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auditorium_id');
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('schedule_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditorium_seat_schedule');
    }
}
