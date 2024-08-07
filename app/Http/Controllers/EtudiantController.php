<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use App\Models\Etudiant;
use Illuminate\Http\JsonResponse;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $etudiants = Etudiant::all();
        return response()->json($etudiants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtudiantRequest $request): JsonResponse
    {
        $etudiant = Etudiant::create($request->validated());
        return response()->json($etudiant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant): JsonResponse
    {
        return response()->json($etudiant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant): JsonResponse
    {
        $etudiant->update($request->validated());
        return response()->json($etudiant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant): JsonResponse
    {
        $etudiant->delete();
        return response()->json(null, 204);
    }
}
