<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
        $randNum = random_int(1, 3);
        $optionRand = [
            [
                'name' => 'admin',
                'permissions' => ['create','read','update', 'delete', 'setting', 'system'],
            ],
            [
                'name' => 'tester',
                'permissions' => ['create','read','update', 'delete', 'setting'],
            ],
            [
                'name' => 'viewer',
                'permissions' => ['read'],
            ],
        ];

        return [
            'uid'  =>  fake()->unique()->regexify('UID[0-9]{8}'),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'avatar' => '',
            'roles' => (object) [
                'name' => $optionRand[$randNum - 1]['name'],
                'permissions' => $optionRand[$randNum -1]['permissions'],
            ],
            'logs' => (object) [
                "2024-03-25 08:16:57" => fake()->randomElement(['login','logout']),
                "2024-03-25 08:18:34" => fake()->randomElement(['update product','create transaction','update contact']),
                "2024-03-25 08:22:45" => fake()->randomElement(['update product','create transaction','update contact']),
            ],
            'settings' => (object) [],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
