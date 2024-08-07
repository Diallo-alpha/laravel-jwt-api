<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Models\Matiere;
use Illuminate\Http\JsonResponse;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $matieres = Matiere::all();
        return response()->json($matieres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatiereRequest $request): JsonResponse
    {
        $matiere = Matiere::create($request->validated());
        return response()->json($matiere, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere): JsonResponse
    {
        return response()->json($matiere);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatiereRequest $request, Matiere $matiere): JsonResponse
    {
        $matiere->update($request->validated());
        return response()->json($matiere);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere): JsonResponse
    {
        $matiere->delete();
        return response()->json(null, 204);
    }
}

