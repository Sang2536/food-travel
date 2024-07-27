<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cid'   =>    fake()->unique()->regexify('CID[0-9]{8}'),
            'display_name'  =>   fake()->name(),
            'email' =>  fake()->unique()->safeEmail(),
            'avatar'    =>  '',
            'address'   =>  fake()->address(),
            'phone' =>  fake()->phoneNumber(),
            'status'    =>  fake()->randomElement(['active','inactive','locked']),
            'type'  =>  fake()->randomElement(['potential_customers', 'visitors']),
            'source'    =>  fake()->randomElement(['facebook', 'youtube', 'tiktok', 'website', 'instagram', 'marketing', '']),
            'descr' =>  fake()->text(),
            'settings'  =>  (object) [],
            'created_by'    =>  1,
        ];
    }
}
