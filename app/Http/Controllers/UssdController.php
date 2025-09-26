<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use AfricasTalking\SDK\MobileData;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UssdController extends Controller
{
    public function handle(Request $request)
    {
        $sessionId   = $request->input('sessionId');
        $serviceCode = $request->input('serviceCode');
        $phoneNumber = $request->input('phoneNumber');
        $text        = $request->input('text');

        // Log pour débugger
        Log::info('USSD Request', [
            'sessionId' => $sessionId,
            'phoneNumber' => $phoneNumber,
            'text' => $text
        ]);

        $steps = explode('*', $text);

        if ($text == "") {
            $response  = "CON Trouver le parcours scolaires. \n";
            $response .= "1. Rechercher un élève\n";
            $response .= "2. Rechercher une école\n";
            return response($response)->header('Content-Type', 'text/plain');
        }

        if ($steps[0] == "1") {
            if (count($steps) == 1) {
                $response = "CON Entrez le nom complet de l'élève :\n";
                return response($response)->header('Content-Type', 'text/plain');
            } elseif (count($steps) == 2) {
                $studentName = trim($steps[1]); // Nettoyer les espaces


                try {
                    $results = $this->getStudentResult($studentName);

                    if ($results->isNotEmpty()) {
                        $response = "END Derniers résultats de l'élève : \n";
                        $response .= "Nom: " . $results->first()->nom_complet . "\n\n";

                        foreach ($results as $result) {
                            $response .= "Année: " . $result->annee_scolaire . "\n";
                            $response .= "École: " . $result->ecole . "\n";
                            $response .= "Pourcentage: " . $result->pourcentage . "%\n";
                            $response .= "Rang: " . $result->rank . "\n\n";
                        }
                    } else {
                        $response = "END Aucun résultat trouvé pour: " . $studentName . "\n";
                        $response .= "Vérifiez l'orthographe du nom.";
                    }
                } catch (\Exception $e) {
                    $response = "END Erreur lors de la recherche. Réessayez plus tard.\n";
                }

                return response($response)->header('Content-Type', 'text/plain');
            }
        }

        if ($steps[0] == "2") {
            // Option pour rechercher une école (à implémenter)
            $response = "END Fonction de recherche d'école en cours de développement.\n";
            return response($response)->header('Content-Type', 'text/plain');
        }

        // Option non valide
        $response = "END Option non valide. Veuillez réessayer.\n";
        return response($response)->header('Content-Type', 'text/plain');
    }

    private function getStudentResult($studentName)
    {
        // Nettoyer le nom de recherche
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
            ->where(function($query) use ($searchName) {
                $query->where(DB::raw('CONCAT(students.first_name, " ", COALESCE(students.middle_name, ""), " ", students.last_name)'), 'LIKE', $searchName)
                      ->orWhere(DB::raw('CONCAT(students.first_name, " ", students.last_name)'), 'LIKE', $searchName)
                      ->orWhere('students.first_name', 'LIKE', $searchName)
                      ->orWhere('students.last_name', 'LIKE', $searchName);
            })
            ->orderBy('school_years.year', 'desc')
            ->limit(3)
            ->get();
    }


}
