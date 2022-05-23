<?php

namespace Database\Seeders;

use App\Models\Auditorium;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    private static $times = ['3:00', '5:00', '7:00', '11:30'];

    private static $days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seats = Seat::factory()->count(30)->create();
        $firstSeats = $seats->filter(function ($value){
            return $value <= 20;
        });

        $auditoriums = Auditorium::factory()->count(2)->hasAttached($firstSeats)->create();
        $auditoriums->add(Auditorium::factory()->count(1)->hasAttached($seats)->create());


    }
}
