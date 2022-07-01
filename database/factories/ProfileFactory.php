<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullName' => $this->faker->name(),
            'address' => $this->faker->address(),
            'nrc' => 'nrc',
            'dob' => $this->faker->date(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
