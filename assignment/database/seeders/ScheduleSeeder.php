<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('schedules')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('schedules')->insert([
        [
            'start_time' => '15:00:00',
        ],
        [
            'start_time' => '17:00:00',
        ],
        [
            'start_time' => '19:00:00',
        ],
        ]);
    }
}
