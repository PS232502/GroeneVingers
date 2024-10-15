<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create(
            [
                'dayname'=>'monday',
                'starttime'=>'10:00:00',
                'endtime'=>'19:00:00',
            ]
            );
    }
}
