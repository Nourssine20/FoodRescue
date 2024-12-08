<?php

namespace Database\Factories;

use App\Models\Benificaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class BenificaireFactory extends Factory
{
    protected $model = Benificaire::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'tel' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'type' => $this->faker->randomElement(['Association', 'Organisation caritative']),
        ];
    }
}
