<?php

namespace Database\Seeders;

use App\Models\Auditorium;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Seat;
use Illuminate\Database\Eloquent\Builder;
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
        $firstSeats = $seats->take(20);
        $movies = Movie::factory()->count(6)->create();

        $auditoriums = Auditorium::factory()->count(2)->hasAttached($firstSeats)->create();
        $auditoriums->add(Auditorium::factory()->hasAttached($seats)->create());

        $this->createBookings($auditoriums, $movies);

    }

    /**
     * @param $auditoriums
     * @param $movies
     * @return void
     */
    private function createBookings($auditoriums, $movies)
    {
        foreach (self::$days as $dayKey => $day) {
            $moviesUsed = [];
            foreach ($auditoriums as $auditorium) {
                if (empty($moviesUsed)) {
                    $movie = $movies->random();
                } else {
                    $movie = $movies->whereNotIn('id', $moviesUsed)->random();
                }
                $moviesUsed[] = $movie->id;

                foreach (self::$times as $keyTime => $time) {
                    if ($keyTime === 3 && $dayKey <= 4) {
                        continue;
                    }

                    Booking::create([
                        'day' => $day,
                        'time' => $time,
                        'movie_id' => $movie->id,
                        'auditorium_id' => $auditorium->id
                    ]);
                }

            }
        }
    }
}
