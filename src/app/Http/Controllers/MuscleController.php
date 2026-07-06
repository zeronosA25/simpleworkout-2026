<?php

namespace App\Http\Controllers;

use App\Models\MuscleGroup;
use Illuminate\View\View;

class MuscleController extends Controller
{
    public function show(string $slug): View
    {
        $muscle = MuscleGroup::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $workouts = $muscle->workouts()
            ->where('is_published', true)
            ->orderBy('title')
            ->get();

        return view('public.muscle', compact('muscle', 'workouts'));
    }
}
