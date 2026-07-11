<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\JsonResponse;

class WorkoutController extends Controller
{
    public function show(string $slug): JsonResponse
    {
        $workout = Workout::where('slug', $slug)
            ->where('is_published', true)
            ->with(['muscleGroup:id,name,slug', 'equipments:id,name'])
            ->first();

        if (! $workout) {
            return response()->json([
                'success' => false,
                'message' => 'Gerakan tidak ditemukan.',
            ], 404);
        }

        $videoId = '';
        if ($workout->video_url) {
            preg_match(
                '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                $workout->video_url,
                $match
            );
            $videoId = $match[1] ?? '';
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $workout->id,
                'title' => $workout->title,
                'slug' => $workout->slug,
                'type' => $workout->type,
                'description' => $workout->description,
                'guide' => $workout->guide,
                'common_mistakes' => $workout->common_mistakes,
                'video_url' => $workout->video_url,
                'video_id' => $videoId,
                'image' => $workout->image ? asset('storage/' . $workout->image) : null,
                'muscle_group' => $workout->muscleGroup,
                'equipments' => $workout->equipments,
                'created_at' => $workout->created_at,
            ],
        ]);
    }
}
