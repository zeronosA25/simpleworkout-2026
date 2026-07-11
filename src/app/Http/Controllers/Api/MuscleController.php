<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MuscleGroup;
use Illuminate\Http\JsonResponse;

class MuscleController extends Controller
{
    public function index(): JsonResponse
    {
        $muscles = MuscleGroup::where('status', true)
            ->select('id', 'name', 'slug', 'description')
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $muscles,
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $muscle = MuscleGroup::where('slug', $slug)
            ->where('status', true)
            ->select('id', 'name', 'slug', 'description')
            ->first();

        if (! $muscle) {
            return response()->json([
                'success' => false,
                'message' => 'Bagian otot tidak ditemukan.',
            ], 404);
        }

        $workouts = $muscle->workouts()
            ->where('is_published', true)
            ->select('id', 'title', 'slug', 'type', 'description', 'image')
            ->orderBy('title')
            ->get();

        $muscle->workouts = $workouts;

        return response()->json([
            'success' => true,
            'data' => $muscle,
        ]);
    }
}
