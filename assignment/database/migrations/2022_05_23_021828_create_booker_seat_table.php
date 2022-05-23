<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatBookerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booker_seat', function (Blueprint $table) {
            $table->foreign('booker_id')->references('id')->on('bookers')
                ->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seats')
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
        Schema::dropIfExists('booker_seat');
    }
}
