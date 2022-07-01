<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transactionLimit>
 */
class TransactionLimitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "Deposit Limit",
            'daily_amount' => 100000,
            'monthly_amount' => 3000000,
            'level_id' => 1,
            'transaction_type_id' => 1,
            'currency_id' => 1,
            'description' => "Level 1 Deposit Limit",
        ];
    }
}
