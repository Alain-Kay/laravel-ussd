<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolYears = [
            [
                'year' => '2022-2023',
                'start_date' => '2022-09-05',
                'end_date' => '2023-06-30',
            ],
            [
                'year' => '2023-2024',
                'start_date' => '2023-09-04',
                'end_date' => '2024-06-28',
            ],
            [
                'year' => '2024-2025',
                'start_date' => '2024-09-02',
                'end_date' => '2025-06-27',
            ],
            [
                'year' => '2025-2026',
                'start_date' => '2025-09-01',
                'end_date' => '2026-06-26',
            ],
            [
                'year' => '2026-2027',
                'start_date' => '2026-09-07',
                'end_date' => '2027-06-25',
            ]
        ];

        foreach ($schoolYears as $schoolYear) {
            SchoolYear::create($schoolYear);
        }
    }
}
