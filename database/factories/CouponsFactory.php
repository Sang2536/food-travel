<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupons>
 */
class CouponsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_day = fake()->dateTime();
        $end_day = fake()->dateTime();

        return [
            'cou_id'    =>  fake()->unique()->regexify('[A-Z]{6}[0-9]{6}'),
            'name'  =>  fake()->name(),
            'slug'  =>  '',
            'quantity'  =>  fake()->numberBetween(100, 200),
            'type'  =>  fake()->randomElement(['gift', 'coupons']),
            'value' =>  fake()->randomElement(['100000', '50000', 'Notebook', 'Master Card']),
            'start_day' =>  $start_day,
            'last_day'  =>  $end_day,
            'apply_for' =>  (object) [
                'brands'    =>  [],
                'products'  =>  [],
                'product_category'  =>  [],
            ],
            'customer_use'  => [],
            'note'  =>  fake()->text(25),
            'created_by'    =>  fake()->numberBetween(2, User::count()),
        ];
    }
}
