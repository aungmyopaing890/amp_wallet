<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transactionType>
 */
class TransactionTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'charge_percentage' => 0,
            'name' => "Deposit",
            'description' => "Deposit",
            'currency_id' => "1",
        ];
    }
}
