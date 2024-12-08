<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transporteur;

class TransporteurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transporteurs = [
            [
                'nom' => 'Transporteur #1',
                'telephone' => '123-456-7890',
                'email' => 'transporteur1@example.com',
            ],
            [
                'nom' => 'Transporteur #2',
                'telephone' => '234-567-8901',
                'email' => 'transporteur2@example.com',
            ],
            [
                'nom' => 'Transporteur #3',
                'telephone' => '345-678-9012',
                'email' => 'transporteur3@example.com',
            ],
            [
                'nom' => 'Transporteur #4',
                'telephone' => '456-789-0123',
                'email' => 'transporteur4@example.com',
            ],
            [
                'nom' => 'Transporteur #5',
                'telephone' => '567-890-1234',
                'email' => 'transporteur5@example.com',
            ],
            [
                'nom' => 'Transporteur #6',
                'telephone' => '678-901-2345',
                'email' => 'transporteur6@example.com',
            ],
            [
                'nom' => 'Transporteur #7',
                'telephone' => '789-012-3456',
                'email' => 'transporteur7@example.com',
            ],
            [
                'nom' => 'Transporteur #8',
                'telephone' => '890-123-4567',
                'email' => 'transporteur8@example.com',
            ],
            [
                'nom' => 'Transporteur #9',
                'telephone' => '901-234-5678',
                'email' => 'transporteur9@example.com',
            ],
            [
                'nom' => 'Transporteur #10',
                'telephone' => '012-345-6789',
                'email' => 'transporteur10@example.com',
            ],
        ];

        foreach ($transporteurs as $transporteur) {
            Transporteur::create($transporteur);
        }
    }
}
