<?php

namespace Database\Seeders;

use App\Models\Benificaire;
use Illuminate\Database\Seeder;

class BeneficiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Benificaire::factory()->count(10)->create();
    }
}
