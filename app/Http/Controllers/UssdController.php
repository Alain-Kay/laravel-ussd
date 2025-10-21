<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use AfricasTalking\SDK\MobileData;
use App\Models\School;
use App\Repository\ResultRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LDAP\Result;

class UssdController extends Controller
{
    public function __construct(
        protected ResultRepository $resultRepository
    ) {}


    public function handle(Request $request)
    {
        $sessionId   = $request->input('sessionId');
        $serviceCode = $request->input('serviceCode');
        $phoneNumber = $request->input('phoneNumber');
        $text        = $request->input('text');



        $steps = explode('*', $text);

        if ($text == "") {
            $response  = "CON Trouver le parcours scolaires. \n";
            $response .= "1. Rechercher un élève\n";

            return response($response)->header('Content-Type', 'text/plain');
        }

        if ($steps[0] == "1") {
            if (count($steps) == 1) {
                $response = "CON Entrez le nom complet de l'élève :\n";
                return response($response)->header('Content-Type', 'text/plain');
            } elseif (count($steps) == 2) {
                $studentName = trim($steps[1]); // Nettoyer les espaces


                try {
                    $results = $this->resultRepository->getStudentResult($studentName);

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

        if ($steps[0] == "2" || $steps[0] == "3") {
            // Option pour rechercher une école (à implémenter)
            $response = "END Option en cours de développement.\n";
            return response($response)->header('Content-Type', 'text/plain');
        }

        // Option non valide
        $response = "END Option non valide. Veuillez réessayer.\n";
        return response($response)->header('Content-Type', 'text/plain');
     }
}
