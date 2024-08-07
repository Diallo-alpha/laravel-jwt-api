<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUeRequest;
use App\Http\Requests\UpdateUeRequest;
use App\Models\Ue;
use Illuminate\Http\JsonResponse;

class UeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $ues = Ue::all();
        return response()->json($ues);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUeRequest $request): JsonResponse
    {
        $ue = Ue::create($request->validated());
        return response()->json($ue, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ue $ue): JsonResponse
    {
        return response()->json($ue);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUeRequest $request, Ue $ue): JsonResponse
    {
        $ue->update($request->validated());
        return response()->json($ue);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ue $ue): JsonResponse
    {
        $ue->delete();
        return response()->json(null, 204);
    }
}
