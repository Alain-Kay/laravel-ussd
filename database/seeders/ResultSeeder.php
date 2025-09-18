<?php

namespace Database\Seeders;

use App\Models\Result;
use App\Models\Student;
use App\Models\School;
use App\Models\SchoolYear;
use App\Models\GradeLevel;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les données nécessaires
        $students = Student::all();
        $schools = School::all();
        $schoolYears = SchoolYear::all();
        $gradeLevels = GradeLevel::all();

        // Créer des résultats pour chaque étudiant
        foreach ($students as $index => $student) {
            // Sélectionner aléatoirement une école, une année scolaire et un niveau
            $school = $schools->random();
            $schoolYear = $schoolYears->random();
            $gradeLevel = $gradeLevels->random();

            // Générer des notes réalistes
            $average = rand(60, 100) + (rand(0, 99) / 100); // Entre 60.00 et 100.00
            $percentage = round(($average / 100) * 100, 2);

            // Déterminer le rang basé sur la moyenne
            $rank = $this->calculateRank($average);

            Result::create([
                'student_id' => $student->id,
                'school_id' => $school->id,
                'school_year_id' => $schoolYear->id,
                'grade_level_id' => $gradeLevel->id,
                'average' => $average,
                'rank' => $rank,
                'percentage' => $percentage,
            ]);
        }

        // Créer des résultats supplémentaires pour certains étudiants
        for ($i = 0; $i < 20; $i++) {
            $student = $students->random();
            $school = $schools->random();
            $schoolYear = $schoolYears->random();
            $gradeLevel = $gradeLevels->random();

            $average = rand(50, 95) + (rand(0, 99) / 100);
            $percentage = round(($average / 100) * 100, 2);
            $rank = $this->calculateRank($average);

            Result::create([
                'student_id' => $student->id,
                'school_id' => $school->id,
                'school_year_id' => $schoolYear->id,
                'grade_level_id' => $gradeLevel->id,
                'average' => $average,
                'rank' => $rank,
                'percentage' => $percentage,
            ]);
        }
    }

    /**
     * Calculer le rang basé sur la moyenne
     */
    private function calculateRank($average)
    {
        if ($average >= 90) {
            return rand(1, 5); // Excellent
        } elseif ($average >= 80) {
            return rand(6, 15); // Très bien
        } elseif ($average >= 70) {
            return rand(16, 30); // Bien
        } elseif ($average >= 60) {
            return rand(31, 50); // Assez bien
        } else {
            return rand(51, 70); // Passable
        }
    }
}
