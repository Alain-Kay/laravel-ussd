<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ResultRepository
{
    public function getStudentResult($studentName)
    {
        $searchName = '%' . str_replace(' ', '%', trim($studentName)) . '%';

        return DB::table('students')
            ->join('results', 'students.id', '=', 'results.student_id')
            ->join('schools', 'results.school_id', '=', 'schools.id')
            ->join('school_years', 'results.school_year_id', '=', 'school_years.id')
            ->select(
                DB::raw('CONCAT(students.first_name, " ", COALESCE(students.middle_name, ""), " ", students.last_name) as nom_complet'),
                'schools.name as ecole',
                'results.percentage as pourcentage',
                'results.rank',
                'results.average',
                'school_years.year as annee_scolaire'
            )
            ->where(function ($query) use ($searchName) {
                $query->where(DB::raw('CONCAT(students.first_name, " ", COALESCE(students.middle_name, ""), " ", students.last_name)'), 'LIKE', $searchName)
                    ->orWhere(DB::raw('CONCAT(students.first_name, " ", students.last_name)'), 'LIKE', $searchName)
                    ->orWhere('students.first_name', 'LIKE', $searchName)
                    ->orWhere('students.last_name', 'LIKE', $searchName);
            })
            ->orderBy('school_years.year', 'desc')
            ->limit(2)
            ->get();
    }
}

