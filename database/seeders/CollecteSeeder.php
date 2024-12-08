<?php

namespace Database\Seeders;

use App\Models\Collecte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollecteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Collecte::factory()->count(10)->create();
    }
}
