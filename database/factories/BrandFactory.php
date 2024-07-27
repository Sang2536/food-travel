<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bid'   =>  fake()->unique()->regexify('[A-Z][0-9]{6}'),
            'name'  =>  fake()->name(),
            'address' =>    fake()->address(),
            'phone' =>  fake()->phoneNumber(),
            'email' =>  fake()->email(),
            'slug'  =>  '',
            'avatar'    =>  '',
            'short_descr'   =>  fake()->text(100),
            'note'  =>  '',
            'created_by'    => fake()->numberBetween(3, User::count()),
        ];
    }
}
