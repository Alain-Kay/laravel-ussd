<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            // Garçons
            [
                'first_name' => 'Yves',
                'middle_name' => 'Nsenga',
                'last_name' => 'Kalume',
                'registration_number' => 'STU2024001',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Patrice',
                'middle_name' => 'Lumumba',
                'last_name' => 'Tshisekedi',
                'registration_number' => 'STU2024002',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Joseph',
                'middle_name' => 'Kasa-Vubu',
                'last_name' => 'Mobutu',
                'registration_number' => 'STU2024003',
                'gender' => 'M',
            ],
            [
                'first_name' => 'André',
                'middle_name' => 'Kabila',
                'last_name' => 'Kalala',
                'registration_number' => 'STU2024004',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Simon',
                'middle_name' => 'Kimbangu',
                'last_name' => 'Mwamba',
                'registration_number' => 'STU2024005',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Vincent',
                'middle_name' => 'Malula',
                'last_name' => 'Tshilombo',
                'registration_number' => 'STU2024006',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Paul',
                'middle_name' => 'Kabila',
                'last_name' => 'Mbuyi',
                'registration_number' => 'STU2024007',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Antoine',
                'middle_name' => 'Tshisekedi',
                'last_name' => 'Kabila',
                'registration_number' => 'STU2024008',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Pierre',
                'middle_name' => 'Mobutu',
                'last_name' => 'Kalala',
                'registration_number' => 'STU2024009',
                'gender' => 'M',
            ],
            [
                'first_name' => 'François',
                'middle_name' => 'Lumumba',
                'last_name' => 'Mwamba',
                'registration_number' => 'STU2024010',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Michel',
                'middle_name' => 'Kasa-Vubu',
                'last_name' => 'Tshilombo',
                'registration_number' => 'STU2024011',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Philippe',
                'middle_name' => 'Kimbangu',
                'last_name' => 'Mbuyi',
                'registration_number' => 'STU2024012',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Marc',
                'middle_name' => 'Malula',
                'last_name' => 'Kabila',
                'registration_number' => 'STU2024013',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Luc',
                'middle_name' => 'Tshisekedi',
                'last_name' => 'Kalala',
                'registration_number' => 'STU2024014',
                'gender' => 'M',
            ],
            [
                'first_name' => 'Thomas',
                'middle_name' => 'Mobutu',
                'last_name' => 'Mwamba',
                'registration_number' => 'STU2024015',
                'gender' => 'M',
            ],
            // Filles
            [
                'first_name' => 'Marie-Claire',
                'middle_name' => 'Tshisekedi',
                'last_name' => 'Mbuyi',
                'registration_number' => 'STU2024016',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Grace',
                'middle_name' => 'Mobutu',
                'last_name' => 'Kalala',
                'registration_number' => 'STU2024017',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Angélique',
                'middle_name' => 'Kabila',
                'last_name' => 'Tshilombo',
                'registration_number' => 'STU2024018',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Thérèse',
                'middle_name' => 'Lumumba',
                'last_name' => 'Mwamba',
                'registration_number' => 'STU2024019',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Catherine',
                'middle_name' => 'Kasa-Vubu',
                'last_name' => 'Mbuyi',
                'registration_number' => 'STU2024020',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Françoise',
                'middle_name' => 'Kimbangu',
                'last_name' => 'Kabila',
                'registration_number' => 'STU2024021',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Monique',
                'middle_name' => 'Malula',
                'last_name' => 'Kalala',
                'registration_number' => 'STU2024022',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Suzanne',
                'middle_name' => 'Tshisekedi',
                'last_name' => 'Mwamba',
                'registration_number' => 'STU2024023',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Béatrice',
                'middle_name' => 'Mobutu',
                'last_name' => 'Tshilombo',
                'registration_number' => 'STU2024024',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Véronique',
                'middle_name' => 'Lumumba',
                'last_name' => 'Mbuyi',
                'registration_number' => 'STU2024025',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Claire',
                'middle_name' => 'Kasa-Vubu',
                'last_name' => 'Kabila',
                'registration_number' => 'STU2024026',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Joséphine',
                'middle_name' => 'Kimbangu',
                'last_name' => 'Kalala',
                'registration_number' => 'STU2024027',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Madeleine',
                'middle_name' => 'Malula',
                'last_name' => 'Mwamba',
                'registration_number' => 'STU2024028',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Célestine',
                'middle_name' => 'Tshisekedi',
                'last_name' => 'Tshilombo',
                'registration_number' => 'STU2024029',
                'gender' => 'F',
            ],
            [
                'first_name' => 'Gisèle',
                'middle_name' => 'Mobutu',
                'last_name' => 'Mbuyi',
                'registration_number' => 'STU2024030',
                'gender' => 'F',
            ]
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
