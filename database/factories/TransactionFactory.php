<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTime();

        return [
            'trans_id'  =>  fake()->unique()->regexify('TRS[0-9]{8}'),
            'customer_id'  =>  '',
            'name'  =>  fake()->word(),
            'type'  =>  fake()->randomElement(['sell','purchase','return_sell','return_purchase']),
            'status'    =>  fake()->randomElement(['done','order','return','delivering']),
            'total_amount'  =>  rand(10, 100) * 10000,
            'currency_unit' =>  'VND',
            'tran_date' =>  $date,
            'products'  =>  (object) [
                fake()->unique()->regexify('PID[0-9]{8}')   =>  [
                    'pid'   =>  fake()->unique()->regexify('PID[0-9]{8}'),
                    'name'  =>  fake()->word(),
                    'price_purchase'    =>  random_int(100000, 500000),
                    'price_sell'    =>  random_int(100000, 500000),
                    'currency_unit' =>  "VND",
                    'quantity'  =>  random_int(1, 3),
                ],
                fake()->unique()->regexify('PID[0-9]{8}')   =>  [
                    'pid'   =>  fake()->unique()->regexify('PID[0-9]{8}'),
                    'name'  =>  fake()->word(),
                    'price_purchase'    =>  random_int(100000, 500000),
                    'price_sell'    =>  random_int(100000, 500000),
                    'currency_unit' =>  "VND",
                    'quantity'  =>  random_int(1, 3),
                ],
            ],
            'payment_log' => (object) [
                'date' => '',
                'amount' => '',
                'notes' => '',
            ],
            'setting'   =>  (object) [],
            'notes' => '',
            'created_by' => 1,
        ];
    }
}
