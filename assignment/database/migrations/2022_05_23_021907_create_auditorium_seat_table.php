<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriumSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditorium_seat', function (Blueprint $table) {
            $table->foreignId('auditorium_id')->references('id')->on('auditoriums')
                ->onDelete('cascade');
            $table->foreignId('seat_id')->references('id')->on('seats')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditorium_seat');
    }
}
