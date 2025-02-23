<?php

namespace Database\Seeders;

// ProductモデルとSeasonモデル,ProductSeasonモデル読み込み
use App\Models\Product;
use App\Models\Season;
use App\Models\ProductSeason;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeasonSeeder::class,
            ProductSeeder::class,
            ProductSeasonSeeder::class,
        ]);
    }
}
