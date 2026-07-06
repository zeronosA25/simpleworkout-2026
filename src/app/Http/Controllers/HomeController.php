<?php

namespace App\Http\Controllers;

use App\Models\MuscleGroup;
use App\Models\PengaturanWebsite;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $muscleGroups = MuscleGroup::where('status', true)->orderBy('name')->get();
        $pengaturan = PengaturanWebsite::first();

        return view('public.home', compact('muscleGroups', 'pengaturan'));
    }
}
