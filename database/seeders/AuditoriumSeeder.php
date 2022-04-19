<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuditoriumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('auditoriums')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('auditoriums')->insert([
        [
            'name' => 'A',
            'total_seats' => 20,
        ],
        [
            'name' => 'B',
            'total_seats' => 20,
        ],
        [
            'name' => 'C',
            'total_seats' => 30,
        ],
        ]);
    }
}
