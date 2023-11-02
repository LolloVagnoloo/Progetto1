<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Car;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->username,
            'password' =>$this->faker->password,
            'remember_token' => Str::random(10),
            'firstname'=> $this->faker->firstName,
            'lastname'=> $this->faker->lastName,
            'residence'=> $this->faker->city,
            'birthdate'=> $this->faker->dateTimeBetween('-70 years','-18 years'),
            'job' => $this->faker->randomElement(['Studente','Cassiere','Infermiere','Muratore','Insegnante','Cuoco','Camionista','Segretario','Addetto HR','Elettricista','Commesso','Disoccupato','Altro'])


        ];
    }

    public function configure()
    {

        return $this->afterCreating(function (User $user){

            $cars = Car::inRandomOrder()->take(rand(1,5))->get();
            $user->cars()->attach($cars);
        });

    }

}
