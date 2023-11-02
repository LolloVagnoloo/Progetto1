<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rentals>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'user_id' => $this->faker->firstName,
            //'car_id' => $this->faker->lastName,
            'start_rent' => $this->faker->dateTimeBetween('-1 year','today'),
            'end_rent' => $this->faker->dateTimeBetween('today','+1 year')
        ];
    }
}
