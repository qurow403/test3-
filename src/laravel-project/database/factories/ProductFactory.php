<?php

namespace Database\Factories;

// Productモデル読み込み
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['キウイ', 'ストロベリー', 'バナナ', 'オレンジ', 'マンゴー']),
            'price' => $this->faker->numberBetween(500, 2000),
            'description' => $this->faker->randomElement([
            '新鮮で甘いフルーツです。',
            '旬の味わいを楽しめます。',
            'とてもジューシーで美味しいです。',
            'ビタミンたっぷりのフルーツです。',
            'そのままでも、スムージーにしても美味しいです。'
        ]),
            'image' => 'default.jpg', // ← デフォルト画像を設定
        ];
    }
}
