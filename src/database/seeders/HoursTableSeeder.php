<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hours')->insert([
            ['date' => '2022-12-20', 'date_id' => 20221220, 'hours' => 3],
            ['date' => '2022-12-21', 'date_id' => 20221221, 'hours' => 4],
            ['date' => '2022-12-22', 'date_id' => 20221222, 'hours' => 6],
            ['date' => '2022-12-26', 'date_id' => 20221226, 'hours' => 7],
            ['date' => '2022-12-27', 'date_id' => 20221227, 'hours' => 4],
            ['date' => '2022-12-28', 'date_id' => 20221228, 'hours' => 2],
            ['date' => '2022-12-29', 'date_id' => 20221229, 'hours' => 8],
            ['date' => '2022-12-27', 'date_id' => 20221227, 'hours' => 3],
            ['date' => '2022-12-27', 'date_id' => 20221227, 'hours' => 2],
            ['date' => '2022-12-30', 'date_id' => 20221230, 'hours' => 10],
            ['date' => '2022-12-31', 'date_id' => 20221231, 'hours' => 7],
            ['date' => '2022-01-01', 'date_id' => 20220101, 'hours' => 4],
            ['date' => '2022-01-02', 'date_id' => 20220102, 'hours' => 9],
            ['date' => '2022-11-10', 'date_id' => 20221110, 'hours' => 4],
            ['date' => '2022-11-23', 'date_id' => 20221123, 'hours' => 5],
        ]);
    }
}
