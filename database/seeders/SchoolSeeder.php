<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'C.S RAHMAN 1',
                'code' => '71001',
                'director' => 'Père Jean-Baptiste Mbuyi',
                'address' => 'Avenue Kasa-Vubu, Kinshasa',
                'phone' => '+243 81 234 5678',
            ],
            [
                'name' => 'C.S LES CHARITABLES',
                'code' => '71002',
                'director' => 'Sœur Marie-Claire Tshisekedi',
                'address' => 'Commune de Limete, Kinshasa',
                'phone' => '+243 99 876 5432',
            ],
            [
                'name' => 'INSTITUT TECHNIQUE SALAMA',
                'code' => '71003',
                'director' => 'Monsieur Patrice Kabila',
                'address' => 'Avenue du 30 Juin, Kinshasa',
                'phone' => '+243 85 123 4567',
            ],
            [
                'name' => 'C.S BERAKAH',
                'code' => '71004',
                'director' => 'Pasteur Simon Kimbangu',
                'address' => 'Commune de Ngaliema, Kinshasa',
                'phone' => '+243 89 765 4321',
            ],
            [
                'name' => 'KINGS COLLEGE',
                'code' => '71005',
                'director' => 'Père André Mwamba',
                'address' => 'Avenue des Cliniques, Kinshasa',
                'phone' => '+243 84 567 8901',
            ],
            [
                'name' => 'C.S MAMAN MOBUTU',
                'code' => '71006',
                'director' => 'Madame Grace Mobutu',
                'address' => 'Commune de Matete, Kinshasa',
                'phone' => '+243 82 345 6789',
            ],
            [
                'name' => 'C.S CARDINAL MALULA',
                'code' => '71007',
                'director' => 'Père Joseph Malula',
                'address' => 'Avenue Colonel Tshatshi, Kinshasa',
                'phone' => '+243 86 789 0123',
            ],
            [
                'name' => 'C.S LUMUMBA',
                'code' => '71008',
                'director' => 'Sœur Angélique Tshilombo',
                'address' => 'Commune de Bandalungwa, Kinshasa',
                'phone' => '+243 88 901 2345',
            ],
            [
                'name' => 'INSTITUT KITUMAINI',
                'code' => '71009',
                'director' => 'Monsieur Antoine Kasa-Vubu',
                'address' => 'Avenue Kasa-Vubu, Kinshasa',
                'phone' => '+243 87 654 3210',
            ],
            [
                'name' => 'LYCEE WEMA',
                'code' => '71010',
                'director' => 'Père Vincent Kalala',
                'address' => 'Commune de Kalamu, Kinshasa',
                'phone' => '+243 83 210 9876',
            ],
            [
                'name' => 'LYCEE TUENDELE',
                'code' => '71011',
                'director' => 'Sœur Thérèse Mbuyi',
                'address' => 'Avenue de la Paix, Kinshasa',
                'phone' => '+243 81 987 6543',
            ],
            [
                'name' => 'INSTITUT IMARA',
                'code' => '71012',
                'director' => 'Père Paul Mwamba',
                'address' => 'Commune de Ngiri-Ngiri, Kinshasa',
                'phone' => '+243 85 432 1098',
            ],
            [
                'name' => 'C.S AGE D\'OR',
                'code' => '71013',
                'director' => 'Père Jean Kabila',
                'address' => 'Avenue de la Justice, Kinshasa',
                'phone' => '+243 89 876 5432',
            ],

        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
