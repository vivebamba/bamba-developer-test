<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuditoriumScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('auditorium_schedule')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('auditorium_schedule')->insert([
        [
            'auditorium_id' => 1,
            'schedule_id' => 1,
        ],
        [
            'auditorium_id' => 1,
            'schedule_id' => 2,
        ],
        [
            'auditorium_id' => 1,
            'schedule_id' => 3,
        ],
        [
            'auditorium_id' => 2,
            'schedule_id' => 1,
        ],
        [
            'auditorium_id' => 2,
            'schedule_id' => 2,
        ],
        [
            'auditorium_id' => 2,
            'schedule_id' => 3,
        ],
        [
            'auditorium_id' => 3,
            'schedule_id' => 1,
        ],
        [
            'auditorium_id' => 3,
            'schedule_id' => 2,
        ],
        [
            'auditorium_id' => 3,
            'schedule_id' => 3,
        ],
        ]);
    }
}
