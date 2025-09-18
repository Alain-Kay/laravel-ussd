<?php

namespace Database\Seeders;

use App\Models\GradeLevel;
use Illuminate\Database\Seeder;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeLevels = [
            ['name' => '1ère Primaire'],
            ['name' => '2ème Primaire'],
            ['name' => '3ème Primaire'],
            ['name' => '4ème Primaire'],
            ['name' => '5ème Primaire'],
            ['name' => '6ème Primaire'],
            ['name' => '1ère Secondaire'],
            ['name' => '2ème Secondaire'],
            ['name' => '3ème Secondaire'],
            ['name' => '4ème Secondaire'],
            ['name' => '5ème Secondaire'],
            ['name' => '6ème Secondaire']
        ];

        foreach ($gradeLevels as $gradeLevel) {
            GradeLevel::create($gradeLevel);
        }
    }
}
