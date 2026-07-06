<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\View\View;

class WorkoutController extends Controller
{
    public function show(string $slug): View
    {
        $workout = Workout::where('slug', $slug)
            ->where('is_published', true)
            ->with('muscleGroup', 'equipments')
            ->firstOrFail();

        return view('public.workout', compact('workout'));
    }
}
