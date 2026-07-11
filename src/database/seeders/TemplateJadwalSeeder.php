<?php

namespace Database\Seeders;

use App\Models\DetailJadwal;
use App\Models\HariJadwal;
use App\Models\TemplateJadwal;
use App\Models\Workout;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TemplateJadwalSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'nama' => 'Full Body 3x Seminggu',
                'deskripsi' => 'Jadwal latihan seluruh tubuh 3 kali seminggu. Cocok untuk pemula yang ingin membangun dasar kekuatan secara merata. Ideal jika Anda hanya punya waktu 3 hari per minggu.',
                'hari_count' => 3,
                'hari' => [
                    [
                        'nama' => 'Hari 1 — Push (Dada & Bahu)',
                        'urutan' => 1,
                        'gerakan' => [
                            ['title' => 'Barbell Bench Press', 'urutan' => 1],
                            ['title' => 'Incline Dumbbell Fly', 'urutan' => 2],
                            ['title' => 'Dumbbell Shoulder Press', 'urutan' => 3],
                            ['title' => 'Lateral Raise', 'urutan' => 4],
                            ['title' => 'Tricep Pushdown', 'urutan' => 5],
                        ],
                    ],
                    [
                        'nama' => 'Hari 2 — Pull (Punggung & Lengan)',
                        'urutan' => 2,
                        'gerakan' => [
                            ['title' => 'Deadlift', 'urutan' => 1],
                            ['title' => 'Barbell Row', 'urutan' => 2],
                            ['title' => 'Dumbbell Row', 'urutan' => 3],
                            ['title' => 'Barbell Curl', 'urutan' => 4],
                            ['title' => 'Dumbbell Curl', 'urutan' => 5],
                        ],
                    ],
                    [
                        'nama' => 'Hari 3 — Legs & Core',
                        'urutan' => 3,
                        'gerakan' => [
                            ['title' => 'Barbell Squat', 'urutan' => 1],
                            ['title' => 'Romanian Deadlift', 'urutan' => 2],
                            ['title' => 'Dumbbell Lunges', 'urutan' => 3],
                            ['title' => 'Plank', 'urutan' => 4],
                            ['title' => 'Leg Raise', 'urutan' => 5],
                        ],
                    ],
                ],
            ],
            [
                'nama' => 'Push Pull Legs (PPL) 6x Seminggu',
                'deskripsi' => 'Split latihan 6 hari seminggu dengan pola Push-Pull-Legs yang diulang 2x. Cocok untuk intermediate yang ingin volume latihan lebih tinggi. Setiap otot dilatih 2x per minggu.',
                'hari_count' => 6,
                'hari' => [
                    [
                        'nama' => 'Hari 1 — Push (Dada Fokus)',
                        'urutan' => 1,
                        'gerakan' => [
                            ['title' => 'Barbell Bench Press', 'urutan' => 1],
                            ['title' => 'Dumbbell Chest Press', 'urutan' => 2],
                            ['title' => 'Cable Chest Fly', 'urutan' => 3],
                            ['title' => 'Lateral Raise', 'urutan' => 4],
                            ['title' => 'Tricep Pushdown', 'urutan' => 5],
                        ],
                    ],
                    [
                        'nama' => 'Hari 2 — Pull (Punggung Fokus)',
                        'urutan' => 2,
                        'gerakan' => [
                            ['title' => 'Deadlift', 'urutan' => 1],
                            ['title' => 'Pull Up', 'urutan' => 2],
                            ['title' => 'Barbell Row', 'urutan' => 3],
                            ['title' => 'Barbell Curl', 'urutan' => 4],
                            ['title' => 'Dumbbell Curl', 'urutan' => 5],
                        ],
                    ],
                    [
                        'nama' => 'Hari 3 — Legs',
                        'urutan' => 3,
                        'gerakan' => [
                            ['title' => 'Barbell Squat', 'urutan' => 1],
                            ['title' => 'Leg Press', 'urutan' => 2],
                            ['title' => 'Romanian Deadlift', 'urutan' => 3],
                            ['title' => 'Dumbbell Lunges', 'urutan' => 4],
                            ['title' => 'Cable Crunch', 'urutan' => 5],
                        ],
                    ],
                    [
                        'nama' => 'Hari 4 — Push (Bahu Fokus)',
                        'urutan' => 4,
                        'gerakan' => [
                            ['title' => 'Barbell Overhead Press', 'urutan' => 1],
                            ['title' => 'Incline Dumbbell Fly', 'urutan' => 2],
                            ['title' => 'Dumbbell Shoulder Press', 'urutan' => 3],
                            ['title' => 'Front Raise', 'urutan' => 4],
                            ['title' => 'Bench Dips', 'urutan' => 5],
                        ],
                    ],
                    [
                        'nama' => 'Hari 5 — Pull (Lengan Fokus)',
                        'urutan' => 5,
                        'gerakan' => [
                            ['title' => 'Dumbbell Row', 'urutan' => 1],
                            ['title' => 'Barbell Curl', 'urutan' => 2],
                            ['title' => 'Dumbbell Curl', 'urutan' => 3],
                            ['title' => 'Tricep Pushdown', 'urutan' => 4],
                            ['title' => 'Front Raise', 'urutan' => 5],
                        ],
                    ],
                    [
                        'nama' => 'Hari 6 — Legs & Abs',
                        'urutan' => 6,
                        'gerakan' => [
                            ['title' => 'Glute Bridge', 'urutan' => 1],
                            ['title' => 'Bodyweight Squat', 'urutan' => 2],
                            ['title' => 'Dumbbell Lunges', 'urutan' => 3],
                            ['title' => 'Plank', 'urutan' => 4],
                            ['title' => 'Crunch', 'urutan' => 5],
                        ],
                    ],
                ],
            ],
            [
                'nama' => 'Home Workout 4x Seminggu',
                'deskripsi' => 'Jadwal latihan di rumah tanpa alat gym. Cocok untuk pemula yang belum memiliki akses ke gym atau lebih nyaman berlatih di rumah. Hanya menggunakan bodyweight dan alat minimal.',
                'hari_count' => 4,
                'hari' => [
                    [
                        'nama' => 'Hari 1 — Upper Body',
                        'urutan' => 1,
                        'gerakan' => [
                            ['title' => 'Push Up', 'urutan' => 1],
                            ['title' => 'Pike Push Up', 'urutan' => 2],
                            ['title' => 'Diamond Push Up', 'urutan' => 3],
                            ['title' => 'Superman Hold', 'urutan' => 4],
                        ],
                    ],
                    [
                        'nama' => 'Hari 2 — Lower Body',
                        'urutan' => 2,
                        'gerakan' => [
                            ['title' => 'Bodyweight Squat', 'urutan' => 1],
                            ['title' => 'Glute Bridge', 'urutan' => 2],
                            ['title' => 'Dumbbell Lunges', 'urutan' => 3],
                            ['title' => 'Plank', 'urutan' => 4],
                        ],
                    ],
                    [
                        'nama' => 'Hari 3 — Core & Abs',
                        'urutan' => 3,
                        'gerakan' => [
                            ['title' => 'Plank', 'urutan' => 1],
                            ['title' => 'Crunch', 'urutan' => 2],
                            ['title' => 'Leg Raise', 'urutan' => 3],
                            ['title' => 'Russian Twist', 'urutan' => 4],
                        ],
                    ],
                    [
                        'nama' => 'Hari 4 — Full Body',
                        'urutan' => 4,
                        'gerakan' => [
                            ['title' => 'Push Up', 'urutan' => 1],
                            ['title' => 'Bodyweight Squat', 'urutan' => 2],
                            ['title' => 'Glute Bridge', 'urutan' => 3],
                            ['title' => 'Superman Hold', 'urutan' => 4],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($templates as $tpl) {
            $template = TemplateJadwal::firstOrCreate(
                ['slug' => Str::slug($tpl['nama'])],
                [
                    'nama_template' => $tpl['nama'],
                    'deskripsi' => $tpl['deskripsi'],
                    'jumlah_hari_per_minggu' => $tpl['hari_count'],
                ]
            );

            foreach ($tpl['hari'] as $hariData) {
                $hari = HariJadwal::firstOrCreate(
                    [
                        'template_jadwal_id' => $template->id,
                        'nama_hari' => $hariData['nama'],
                    ],
                    ['urutan_hari' => $hariData['urutan']]
                );

                foreach ($hariData['gerakan'] as $g) {
                    $workout = Workout::where('title', $g['title'])->first();
                    if (! $workout) continue;

                    DetailJadwal::firstOrCreate(
                        [
                            'hari_jadwal_id' => $hari->id,
                            'gerakan_id' => $workout->id,
                        ],
                        ['urutan_gerakan' => $g['urutan']]
                    );
                }
            }
        }
    }
}
