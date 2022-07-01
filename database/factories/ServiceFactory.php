<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\services>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "MPT Bill",
            'description' => "MPT Bill",
            'price' => '1000',
            'sorting' => "1",
            'service_type_id' => "1",
        ];
    }
}
