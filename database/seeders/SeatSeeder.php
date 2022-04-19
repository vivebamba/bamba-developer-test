<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('seats')->truncate();
        Schema::enableForeignKeyConstraints();

        $alphabet= ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $allSeats = [];
        foreach ($alphabet as $key => $value) {
            for ($i=1; $i < 11 ; $i++) { 
                $seatArr = [
                    'name'=> $value.$i,
                ];
                if (count($allSeats) < 30) {
                    array_push($allSeats, $seatArr);
                }
            }
        }

        DB::table('seats')->insert($allSeats);
    }
}
