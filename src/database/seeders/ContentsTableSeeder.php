<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contents')->insert([
            ['date' => '2022-12-20', 'date_id' => 20221220, 'content' => "N予備校"],
            ['date' => '2022-12-21', 'date_id' => 20221221, 'content' => "ドットインストール"],
            ['date' => '2022-12-21', 'date_id' => 20221221, 'content' => "POSSE課題"],
            ['date' => '2022-12-22', 'date_id' => 20221222, 'content' => "POSSE課題"],
            ['date' => '2022-12-22', 'date_id' => 20221222, 'content' => "ドットインストール"],
            ['date' => '2022-12-23', 'date_id' => 20221223, 'content' => "POSSE課題"],
            ['date' => '2022-12-23', 'date_id' => 20221223, 'content' => "ドットインストール"],
            ['date' => '2022-12-23', 'date_id' => 20221223, 'content' => "N予備校"],
        ]);
    }
}
