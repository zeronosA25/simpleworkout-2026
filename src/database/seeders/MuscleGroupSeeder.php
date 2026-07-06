<?php

namespace Database\Seeders;

use App\Models\MuscleGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MuscleGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            ['name' => 'Dada', 'description' => 'Otot pectoralis — Bench Press, Push Up, Chest Fly'],
            ['name' => 'Bahu', 'description' => 'Otot deltoid — Shoulder Press, Lateral Raise, Front Raise'],
            ['name' => 'Punggung', 'description' => 'Otot latissimus & trapezius — Pull Up, Deadlift, Barbell Row'],
            ['name' => 'Kaki', 'description' => 'Otot quadriceps, hamstring, glutes — Squat, Leg Press, Lunges'],
            ['name' => 'Lengan', 'description' => 'Otot biceps & triceps — Curl, Tricep Extension, Dips'],
            ['name' => 'Perut', 'description' => 'Otot abdominal — Plank, Crunch, Leg Raise'],
        ];

        foreach ($groups as $group) {
            MuscleGroup::firstOrCreate(
                ['slug' => Str::slug($group['name'])],
                [
                    'name' => $group['name'],
                    'description' => $group['description'],
                    'status' => true,
                ]
            );
        }
    }
}
