<?php

namespace Database\Seeders;

use App\Models\PengaturanWebsite;
use Illuminate\Database\Seeder;

class PengaturanWebsiteSeeder extends Seeder
{
    public function run(): void
    {
        PengaturanWebsite::firstOrCreate(
            ['nama_website' => 'SimpleWorkout'],
            [
                'hero_title' => 'Selamat Datang di SimpleWorkout',
                'hero_subtitle' => 'Platform belajar gerakan gym untuk pemula. Pilih otot yang ingin difokuskan dan pelajari teknik yang benar.',
                'deskripsi_singkat_website' => 'Platform tutorial workout gym untuk pemula berbasis web.',
                'jam_operasional' => 'Senin–Jumat, 08.00–17.00',
            ]
        );
    }
}
