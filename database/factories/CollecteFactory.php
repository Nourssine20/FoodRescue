<?php

namespace Database\Factories;

use App\Models\Collecte;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collecte>
 */
class CollecteFactory extends Factory
{
    protected $model = Collecte::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_collecte' => $this->faker->date(),
            'statut' => $this->faker->randomElement(['planifié', 'en cours', 'terminé']),
        
        ];
    }
}
