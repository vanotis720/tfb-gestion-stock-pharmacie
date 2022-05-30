<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['m', 'f'];
        $statut = ['marier', 'célibataire'];

        return [
            'nom' => $this->faker->name(),
            'sexe' => $gender[rand(0, 1)],
            'age' => $this->faker->numberBetween(10, 85),
            'statut' => $statut[rand(0, 1)],
            'subscription' => rand(0, 1),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
