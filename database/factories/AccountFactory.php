<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'acc_id'  =>  fake()->unique()->regexify('AID[0-9]{8}'),
            'qr_code' =>    '',
            'display_name' =>   $name,
            'login_name'  =>  preg_replace('/\s+/', '', strtolower($name)),
            'email' =>  fake()->unique()->email(),
            'password' => static::$password ??= Hash::make('pass1234'),
            'remember_token' => Str::random(10),
            'avatar' => '',
            'address' =>    fake()->address(),
            'phone' =>  fake()->phoneNumber(),
            'status'  =>  fake()->randomElement(['active','inactive','locked']),
            'descr' => fake()->text(),
            'logs' => (object) [
                "2024-03-25 08:16:57" => fake()->randomElement(['login','logout','change password']),
                "2024-03-25 08:34:02" => fake()->randomElement(['login','logout','change password']),

                // (string) fake()->dateTime() => fake()->randomElement(['login','logout','change password']),
            ],
            'settings' => (object) [],
        ];
    }
}