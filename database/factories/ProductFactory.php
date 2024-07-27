<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pid'   =>  fake()->unique()->regexify('PID[0-9]{8}'),
            'slug'   =>  '',
            'name'  =>  fake()->word(),
            'avatar'    =>  '',
            'type'  =>  fake()->randomElement(['single', 'combo', 'variable']),
            'status'    =>  fake()->randomElement(['active', 'inactive', 'pause', 'out_of_stock']),
            'category_id'  =>  1,
            'brand_id'  =>  1,
            'unit_id'  =>  1,
            'point_trans'   =>  random_int(5, 22),
            'quantities'    =>  (object) [
                'total' =>  random_int(30, 100),
                'remaining' =>  random_int(30, 100),
                'warning'   =>  random_int(2, 5),
            ],
            'prices'    =>  (object) [
                'purchase'  =>  random_int(100000, 500000),
                'sell'  =>  random_int(110000, 600000),
                'discount'  =>  random_int(0, 35) * 1000,
                'currency_unit' =>  'VND',
            ],
            'media' =>  (object) [],
            'rates' =>  (object) [
                'star'  =>  (float) rand(0, 5),
                'point' =>  (float) rand(0, 10),
            ],
            'settings'  =>  (object) [],
            'created_by'    =>  1,
        ];
    }
}
