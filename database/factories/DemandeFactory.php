<?php

namespace Database\Factories;

use App\Models\Benificaire;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    protected $model = Demande::class;

    public function definition()
    {
        return [
            'benificaire_id' => Benificaire::factory(),
            'type_produit' => $this->faker->word(),
            'quantite' => $this->faker->numberBetween(1, 100),
            'frequence_besoin' => $this->faker->randomElement(['quotidien', 'hebdomadaire', 'mensuel']),
            'statut' => $this->faker->randomElement(['en attente', 'satisfait']),
        ];
    }
}
