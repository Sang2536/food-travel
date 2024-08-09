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
        $bid = fake()->unique()->regexify('[A-Z0-9]{6}');
        $userUid = User::all()->select('uid')->toArray();

        return [
            'bid'   =>  $bid,
            'name'  =>  fake()->name(),
            'address' =>    fake()->address(),
            'phone' =>  fake()->phoneNumber(),
            'email' =>  fake()->email(),
            'slug'  =>  '/' . $bid,
            'avatar'    =>  '',
            'short_descr'   =>  fake()->text(100),
            'note'  =>  null,
            'created_by'    => fake()->randomElement($userUid),
        ];
    }
}
