<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            ['date' => '2022-12-20', 'date_id' => 20221220, 'language' => "CSS"],
            ['date' => '2022-12-21', 'date_id' => 20221221, 'language' => "CSS"],
            ['date' => '2022-12-21', 'date_id' => 20221221, 'language' => "PHP"],
            ['date' => '2022-12-22', 'date_id' => 20221222, 'language' => "CSS"],
            ['date' => '2022-12-22', 'date_id' => 20221222, 'language' => "PHP"],
            ['date' => '2022-12-22', 'date_id' => 20221222, 'language' => "SQL"],
        ]);
    }
}
