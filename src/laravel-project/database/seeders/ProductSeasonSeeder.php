<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// テーブルのシードを作成する処理
use Illuminate\Support\Facades\DB;

// モデル読み込み
use App\Models\Product;
use App\Models\Season;

class ProductSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = Season::all();

        Product::all()->each(function ($product) use ($seasons) {
            $randomSeasons = $seasons->random(rand(1, 2))->pluck('id'); // 1〜2つの季節をランダムに選択
            $product->seasons()->attach($randomSeasons);
        });
    }
}
