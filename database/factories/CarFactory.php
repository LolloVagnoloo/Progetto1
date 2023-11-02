<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'plate' => strtoupper($this->faker->regexify('[A-Z]{2}\d{3}[A-Z]{2}')),

            'brand' => $this->faker->text(20),
            'model' => $this->faker->text(20),
            'displacement' => $this->faker->numberBetween(5, 50) * 100,
            'price' => $this->faker->numberBetween(5, 50) * 10,
            'seats' => $this->faker->randomElement([1,2,4,5,7,9]),
            'description' => $this->faker->paragraph(5)

        ];
    }
}
