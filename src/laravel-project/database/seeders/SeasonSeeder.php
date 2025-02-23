<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// テーブルのシードを作成する処理
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = ['春', '夏', '秋', '冬'];

        foreach ($seasons as $season) {
            DB::table('seasons')->insert([
                'name' => $season,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
