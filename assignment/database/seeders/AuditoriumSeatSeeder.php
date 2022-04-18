<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuditoriumSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('auditorium_seat')->truncate();
        Schema::enableForeignKeyConstraints();

        // DB::table('auditorium_seat')->insert([
        // [
        //     'auditorium_id' => 1,
        //     'sead_id' => 1,
        // ],
        // [
        //     'auditorium_id' => 1,
        //     'sead_id' => 2,
        // ],
        // [
        //     'auditorium_id' => 1,
        //     'sead_id' => 3,
        // ],
        // [
        //     'auditorium_id' => 2,
        //     'sead_id' => 4,
        // ],
        // [
        //     'auditorium_id' => 2,
        //     'sead_id' => 5,
        // ],
        // [
        //     'auditorium_id' => 2,
        //     'sead_id' => 6,
        // ],
        // [
        //     'auditorium_id' => 3,
        //     'sead_id' => 7,
        // ],
        // [
        //     'auditorium_id' => 3,
        //     'sead_id' => 8,
        // ],
        // [
        //     'auditorium_id' => 3,
        //     'sead_id' => 9,
        // ],
        // ]);
        $auditoriums= ['A', 'B', 'C'];
        $allSeats = [];
        foreach ($auditoriums as $key => $value) {
            $limit = 0;
            switch ($value) {
                case 'A':
                    $limit = 20;
                    break;
                case 'B':
                    $limit = 20;
                    break;
                case 'C':
                    $limit = 30;
                    break;
                default:
                    break;
            }
            for ($i=1; $i <= $limit ; $i++) { 
                $seatArr = [
                    'auditorium_id' => $key + 1,
                    'seat_id' => $i,
                ];
                    array_push($allSeats, $seatArr);
            }
        }

        DB::table('auditorium_seat')->insert($allSeats);
    }
}
