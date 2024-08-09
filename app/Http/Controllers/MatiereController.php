<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Models\Matiere;
use Illuminate\Http\JsonResponse;
/**
 * @OA\Info(
 *     title="API de Gestion des Matières",
 *     version="1.0.0",
 *     description="Documentation de l'API de gestion des matières"
 * )
 */
class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/matieres",
     *     tags={"Matières"},
     *     summary="Récupérer toutes les matières",
     *     description="Retourne une liste de toutes les matières",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des matières",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Matiere"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $matieres = Matiere::all();
        return response()->json($matieres);
    }

    /**
     * @OA\Post(
     *     path="/api/matieres",
     *     tags={"Matières"},
     *     summary="Créer une nouvelle matière",
     *     description="Créé une nouvelle matière et la retourne",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Matiere")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Matière créée",
     *         @OA\JsonContent(ref="#/components/schemas/Matiere")
     *     )
     * )
     */
    public function store(StoreMatiereRequest $request): JsonResponse
    {
        $matiere = Matiere::create($request->validated());
        return response()->json($matiere, 201);
    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/api/matieres/{matiere}",
     *     tags={"Matières"},
     *     summary="Afficher une matière spécifique",
     *     description="Retourne les détails d'une matière spécifique",
     *     @OA\Parameter(
     *         name="matiere",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détails de la matière",
     *         @OA\JsonContent(ref="#/components/schemas/Matiere")
     *     )
     * )
     */
    public function show(Matiere $matiere): JsonResponse
    {
        return response()->json($matiere);
    }

    /**
     * Update the specified resource in storage.
     */
      /**
     * @OA\Put(
     *     path="/api/matieres/{matiere}",
     *     tags={"Matières"},
     *     summary="Mettre à jour une matière",
     *     description="Met à jour les détails d'une matière spécifique",
     *     @OA\Parameter(
     *         name="matiere",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Matiere")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Matière mise à jour",
     *         @OA\JsonContent(ref="#/components/schemas/Matiere")
     *     )
     * )
     */
    public function update(UpdateMatiereRequest $request, Matiere $matiere): JsonResponse
    {
        $matiere->update($request->validated());
        return response()->json($matiere);
    }

    /**
     * Remove the specified resource from storage.
     */
     /**
     * @OA\Delete(
     *     path="/api/matieres/{matiere}",
     *     tags={"Matières"},
     *     summary="Supprimer une matière",
     *     description="Supprime une matière spécifique",
     *     @OA\Parameter(
     *         name="matiere",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Matière supprimée"
     *     )
     * )
     */
    public function destroy(Matiere $matiere): JsonResponse
    {
        $matiere->delete();
        return response()->json(null, 204);
    }
}

