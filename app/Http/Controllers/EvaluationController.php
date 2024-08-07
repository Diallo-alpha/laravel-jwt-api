<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Evaluation;
use Illuminate\Http\JsonResponse;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $evaluations = Evaluation::all();
        return response()->json($evaluations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request): JsonResponse
    {
        $evaluation = Evaluation::create($request->validated());
        return response()->json($evaluation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation): JsonResponse
    {
        return response()->json($evaluation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation): JsonResponse
    {
        $evaluation->update($request->validated());
        return response()->json($evaluation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation): JsonResponse
    {
        $evaluation->delete();
        return response()->json(null, 204);
    }
}
