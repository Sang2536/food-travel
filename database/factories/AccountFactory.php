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

        $logs = [];
        for ($i=0; $i < random_int(1, 6); $i++) {
            $date = fake()->dateTime();
            $item = (object) [
                'date' => $date->format('Y-m-d\TH:i:s.v\Z'),
                'action' => fake()->randomElement(['login','logout','change password','update profile','purchase','order','returns','pay']),
            ];

            array_push($logs, $item);
        }

        return [
            'acc_id'  =>  fake()->unique()->regexify('AID[0-9]{8}'),
            'slug' =>    '',
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
            'logs' => (object) $logs,
            'settings' => (object) [],
        ];
    }
}
