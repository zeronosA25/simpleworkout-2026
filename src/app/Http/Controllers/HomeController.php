<?php

namespace App\Http\Controllers;

use App\Models\MuscleGroup;
use App\Models\PengaturanWebsite;
use App\Models\TemplateJadwal;
use App\Models\Workout;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $muscleGroups = MuscleGroup::where('status', true)->orderBy('name')->get();
        $pengaturan = PengaturanWebsite::first();
        $totalWorkouts = Workout::where('is_published', true)->count();
        $totalMuscles = MuscleGroup::where('status', true)->count();
        $totalSchedules = TemplateJadwal::count();

        return view('public.home', compact('muscleGroups', 'pengaturan', 'totalWorkouts', 'totalMuscles', 'totalSchedules'));
    }
}
