<?php
namespace App\Http\Controllers;


use App\Http\Requests\StoreEtudiantRequest;
use App\Models\Etudiant;
use Illuminate\Http\JsonResponse;

class EtudiantController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        \Log::info('EtudiantController@index est exécuté');

        $etudiants = Etudiant::all();
        return response()->json($etudiants);
    }

    /**
     * Stocke une nouvelle ressource en base de données.
     */
    public function store(StoreEtudiantRequest $request): JsonResponse
    {
        // Validation des données effectuée par StoreEtudiantRequest
        $validated = $request->validated();

        \Log::info('Données validées : ', $validated);

        // Création d'une nouvelle instance d'étudiant
        $etudiant = new Etudiant();

        // Assignation des valeurs validées aux attributs de l'étudiant
        $etudiant->nom = $validated['nom'];
        $etudiant->prenom = $validated['prenom'];
        $etudiant->adresse = $validated['adresse'] ?? null;
        $etudiant->telephone = $validated['telephone'] ?? null;
        $etudiant->date_de_naissance = $validated['date_de_naissance'];
        $etudiant->matricule = $this->generateMatricule();
        $etudiant->email = $validated['email'];
        $etudiant->mot_de_passe = isset($validated['mot_de_passe']) ? bcrypt($validated['mot_de_passe']) : null;
        $etudiant->photo = $validated['photo'] ?? null;

        \Log::info('Étudiant avant sauvegarde : ', $etudiant->toArray());

        // Sauvegarde de l'étudiant dans la base de données
        $etudiant->save();

        \Log::info('Étudiant sauvegardé : ', $etudiant->toArray());

        return response()->json($etudiant, 201);
    }

    /**
     * Génère un matricule unique.
     */
    private function generateMatricule(): string
    {
        return 'MAT' . strtoupper(uniqid());
    }

    /**
     * Affiche une ressource spécifique.
     */
    public function show(Etudiant $etudiant): JsonResponse
    {
        return response()->json($etudiant);
    }

    /**
     * Met à jour une ressource spécifique en base de données.
     */
    public function update(StoreEtudiantRequest $request, Etudiant $etudiant): JsonResponse
    {
        // Validation des données effectuée par UpdateEtudiantRequest
        $validated = $request->validated();

        // Mise à jour de l'étudiant avec les données validées
        $etudiant->update($validated);

        return response()->json($etudiant);
    }

    /**
     * Supprime une ressource spécifique de la base de données.
     */
    public function destroy(Etudiant $etudiant): JsonResponse
    {
        $etudiant->delete();
        return response()->json(null, 204);
    }
}
