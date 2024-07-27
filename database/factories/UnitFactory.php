<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'un_id' =>  fake()->unique()->regexify('[A-Z0-9]{12}'),
            'name'  =>  fake()->name(),
            'abbr'  =>  fake()->unique()->regexify('[A-Z0-9]{3}'),
            'short_descr'   =>  fake()->text(100),
            'note'  =>  fake()->text(20),
            'created_by'    =>  fake()->numberBetween(2, User::count()),
        ];
    }
}
