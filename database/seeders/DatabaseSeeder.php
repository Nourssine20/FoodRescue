<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(30)->create();
        
        // Appel correct du seeder
        $this->call(BeneficiaireSeeder::class);
        $this->call(CollecteSeeder::class);
        $this->call(DemandeSeeder::class);
        $this->call(TransporteurTableSeeder::class);
    }
}
