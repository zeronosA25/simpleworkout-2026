<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\MuscleGroup;
use App\Models\Workout;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WorkoutSeeder extends Seeder
{
    public function run(): void
    {
        $workouts = $this->data();

        foreach ($workouts as $item) {
            $muscleGroup = MuscleGroup::where('slug', $item['muscle_slug'])->first();
            if (! $muscleGroup) continue;

            $workout = Workout::firstOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'muscle_group_id' => $muscleGroup->id,
                    'title' => $item['title'],
                    'type' => $item['type'],
                    'description' => $item['description'],
                    'guide' => $item['guide'],
                    'common_mistakes' => $item['common_mistakes'],
                    'video_url' => $item['video_url'] ?? null,
                    'is_published' => true,
                ]
            );

            if (! empty($item['equipment'])) {
                $equipmentIds = Equipment::whereIn('name', $item['equipment'])->pluck('id');
                $workout->equipments()->syncWithoutDetaching($equipmentIds);
            }
        }
    }

    private function data(): array
    {
        return [
            // ==================== DADA (Chest) ====================
            [
                'muscle_slug' => 'dada',
                'title' => 'Barbell Bench Press',
                'type' => 'gym',
                'equipment' => ['Barbell', 'Bench'],
                'video_url' => 'https://youtu.be/4Y2ZdHCOXok?si=C0ZycDCNT0kWtSsR',
                'description' => 'Bench press adalah gerakan fundamental untuk membangun kekuatan dan massa otot dada bagian tengah.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berbaring telentang di bangku datar</li><li>Kaki menapak lantai dengan stabil</li><li>Pegang barbell dengan grip sedikit lebih lebar dari bahu</li><li>Lepas barbell dari rak, posisikan di atas dada</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik napas, turunkan barbell perlahan ke dada bagian bawah</li><li>Sentuh ringan dada, jangan memantulkan</li><li>Hembuskan napas, dorong barbell kembali ke posisi awal</li><li>Kunci siku di posisi atas tanpa menguncinya sepenuhnya</li></ul><p><strong>3. Tips</strong></p><ul><li>Pertahankan bahu tetap turun dan rapat ke bangku</li><li>Jaga sedikit lengkungan alami di punggung bawah</li><li>Gunakan tempo 2 detik turun, 1 detik dorong</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Memantulkan barbell di dada</strong> — Sentuh ringan, jangan memantul. Kurangi beban jika perlu.</li><li><strong>❌ Bahu terangkat (shoulder shrug)</strong> — Jaga bahu tetap turun dan rapat ke bangku.</li><li><strong>❌ Grip terlalu lebar</strong> — Berisiko cedera bahu. Gunakan grip selebar bahu atau sedikit lebih lebar.</li><li><strong>❌ Kaki tidak stabil</strong> — Tanam kaki kuat di lantai untuk stabilitas.</li></ul>',
            ],
            [
                'muscle_slug' => 'dada',
                'title' => 'Dumbbell Chest Press',
                'type' => 'gym',
                'equipment' => ['Dumbbell', 'Bench'],
                'video_url' => 'https://www.youtube.com/watch?v=VmBMOtUP1-0',
                'description' => 'Variasi bench press menggunakan dumbbell untuk jangkauan gerak lebih luas dan koreksi ketidakseimbangan otot.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berbaring di bangku datar dengan dumbbell di kedua tangan</li><li>Posisikan dumbbell setinggi bahu, telapak tangan menghadap ke depan</li><li>Kaki menapak lantai</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Dorong dumbbell ke atas hingga lengan lurus</li><li>Turunkan perlahan hingga siku sejajar atau sedikit di bawah bangku</li><li>Ulangi dengan tempo terkontrol</li></ul><p><strong>3. Tips</strong></p><ul><li>Jaga siku 45 derajat dari tubuh</li><li>Rentangkan dada di posisi bawah</li><li>Jangan benturkan dumbbell di posisi atas</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Menjatuhkan dumbbell terlalu cepat</strong> — Turunkan dengan kontrol 2-3 detik.</li><li><strong>❌ Siku terlalu lebar (90°)</strong> — Risiko cedera bahu, jaga siku sekitar 45° dari tubuh.</li></ul>',
            ],
            [
                'muscle_slug' => 'dada',
                'title' => 'Push Up',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'video_url' => 'https://www.youtube.com/watch?v=IODxDxX7oi4',
                'description' => 'Gerakan bodyweight klasik untuk melatih dada, bahu depan, dan triceps tanpa alat apapun.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Posisi plank dengan tangan sedikit lebih lebar dari bahu</li><li>Tubuh lurus dari kepala hingga tumit</li><li>Kaki rapat, punggung rata</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik napas, tekuk siku dan turunkan tubuh</li><li>Dada hampir menyentuh lantai</li><li>Hembuskan napas, dorong kembali ke posisi awal</li></ul><p><strong>3. Tips</strong></p><ul><li>Tahan otot perut selama gerakan</li><li>Jangan biarkan pinggul turun atau naik</li><li>Variasi lutut di lantai jika terlalu sulit</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Pinggul turun (sagging hips)</strong> — Aktifkan core, jaga tubuh lurus.</li><li><strong>❌ Siku terlalu melebar</strong> — Jaga siku sekitar 45° dari tubuh.</li><li><strong>❌ Gerakan setengah (half rep)</strong> — Pastikan dada hampir menyentuh lantai.</li></ul>',
            ],
            [
                'muscle_slug' => 'dada',
                'title' => 'Incline Dumbbell Fly',
                'type' => 'gym',
                'equipment' => ['Dumbbell', 'Bench'],
                'description' => 'Gerakan isolasi untuk meregangkan dan membentuk otot dada bagian atas dengan fokus pada kontraksi.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Atur bangku miring 30-45 derajat</li><li>Pegang dumbbell di atas dada dengan lengan sedikit ditekuk</li><li>Telapak tangan saling berhadapan</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik napas, buka lengan ke samping secara perlahan</li><li>Pertahankan sedikit tekukan di siku</li><li>Rasakan regangan di dada</li><li>Hembuskan napas, bawa dumbbell kembali ke atas</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Terlalu banyak beban</strong> — Gunakan beban ringan, fokus pada gerakan terkontrol.</li><li><strong>❌ Meluruskan lengan sepenuhnya</strong> — Jaga sedikit tekukan di siku sepanjang waktu.</li></ul>',
            ],
            [
                'muscle_slug' => 'dada',
                'title' => 'Cable Chest Fly',
                'type' => 'gym',
                'equipment' => ['Cable Machine'],
                'description' => 'Variasi cable untuk kontraksi dada yang konstan. Cocok untuk membentuk dan mendefinisikan otot dada.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Atur kabel di posisi setinggi bahu</li><li>Berdiri di tengah, pegang pegangan D-handle</li><li>Bungkukkan badan sedikit ke depan, satu kaki di depan</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Dengan siku sedikit ditekuk, bawa kedua tangan ke depan dan ke bawah</li><li>Fokus pada kontraksi dada di posisi tengah</li><li>Kembali perlahan ke posisi awal dengan kontrol</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Terlalu banyak beban</strong> — Gerakan ini adalah isolasi, gunakan beban ringan-sedang.</li><li><strong>❌ Menarik dengan tangan</strong> — Fokus pada meremas dada, bukan menarik lengan.</li></ul>',
            ],

            // ==================== BAHU (Shoulders) ====================
            [
                'muscle_slug' => 'bahu',
                'title' => 'Barbell Overhead Press',
                'type' => 'gym',
                'equipment' => ['Barbell'],
                'video_url' => 'https://youtu.be/cGnhixvC8uA?si=_X1RRlLs8zoyYDQ9',
                'description' => 'Gerakan compound utama untuk membangun bahu depan (anterior deltoid) dan kekuatan overhead pressing.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri dengan kaki selebar bahu</li><li>Pegang barbell di depan bahu, grip sedikit lebih lebar dari bahu</li><li>Kencangkan perut dan glutes</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik napas, dorong barbell lurus ke atas kepala</li><li>Kunci lengan di posisi atas</li><li>Turunkan perlahan kembali ke depan bahu</li></ul><p><strong>3. Tips</strong></p><ul><li>Jangan membungkukkan punggung ke belakang (overarching)</li><li>Jaga kepala sedikit ke belakang saat barbell lewat</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Punggung over-extend</strong> — Kencangkan glutes dan core, jangan membusur.</li><li><strong>❌ Grip terlalu lebar</strong> — Gunakan grip selebar bahu, tidak lebih.</li><li><strong>❌ Barbell tidak melewati kepala</strong> — Dorong hingga lengan lurus di atas kepala.</li></ul>',
            ],
            [
                'muscle_slug' => 'bahu',
                'title' => 'Dumbbell Shoulder Press',
                'type' => 'gym',
                'equipment' => ['Dumbbell', 'Bench'],
                'video_url' => 'https://youtu.be/qEwK8Q3E3T0?si=C0ZycDCNT0kWtSsR',
                'description' => 'Alternatif overhead press dengan dumbbell untuk jangkauan gerak lebih alami dan perbaikan ketidakseimbangan.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Duduk di bangku dengan sandaran tegak</li><li>Pegang dumbbell setinggi bahu, telapak tangan menghadap ke depan</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Dorong dumbbell ke atas hingga lengan lurus</li><li>Turunkan perlahan hingga setinggi telinga</li><li>Ulangi dengan kontrol penuh</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Membenturkan dumbbell di atas</strong> — Hentikan sesaat sebelum dumbbell bersentuhan.</li><li><strong>❌ Menjatuhkan beban</strong> — Turunkan dengan kontrol 2-3 detik.</li></ul>',
            ],
            [
                'muscle_slug' => 'bahu',
                'title' => 'Lateral Raise',
                'type' => 'gym',
                'equipment' => ['Dumbbell'],
                'description' => 'Gerakan isolasi utama untuk bahu samping (lateral deltoid) — memberi tampilan lebar pada bahu.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri dengan kaki selebar pinggul</li><li>Pegang dumbbell di samping tubuh, telapak tangan menghadap ke dalam</li><li>Sedikit tekuk siku</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Angkat dumbbell ke samping hingga setinggi bahu</li><li>Tahan sejenak di posisi atas</li><li>Turunkan perlahan kembali ke samping</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Menggunakan momentum</strong> — Gerakan harus lambat dan terkontrol, jangan mengayun.</li><li><strong>❌ Beban terlalu berat</strong> — Gunakan beban ringan, fokus pada kualitas gerakan.</li></ul>',
            ],
            [
                'muscle_slug' => 'bahu',
                'title' => 'Front Raise',
                'type' => 'gym',
                'equipment' => ['Dumbbell'],
                'description' => 'Gerakan isolasi untuk melatih bahu depan (anterior deltoid).',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri, pegang dumbbell di depan paha</li><li>Telapak tangan menghadap ke bawah</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Angkat dumbbell ke depan hingga setinggi bahu</li><li>Tahan sejenak, turunkan perlahan</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Mengayun dari pinggang</strong> — Jaga tubuh stabil, hanya lengan yang bergerak.</li><li><strong>❌ Angkat terlalu tinggi</strong> — Cukup setinggi bahu, tidak lebih.</li></ul>',
            ],
            [
                'muscle_slug' => 'bahu',
                'title' => 'Pike Push Up',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Push up dengan posisi pike (segitiga) untuk mensimulasikan overhead press tanpa alat.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Posisi downward dog (tubuh membentuk segitiga)</li><li>Tangan selebar bahu, kaki lurus, tumit terangkat</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tekuk siku, turunkan kepala ke arah lantai</li><li>Dorong kembali ke posisi awal</li><li>Fokus pada tekanan di bahu</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Pinggul terlalu rendah</strong> — Pertahankan posisi pinggul tinggi.</li><li><strong>❌ Siku melebar</strong> — Jaga siku agak ke dalam.</li></ul>',
            ],

            // ==================== PUNGGUNG (Back) ====================
            [
                'muscle_slug' => 'punggung',
                'title' => 'Deadlift',
                'type' => 'gym',
                'equipment' => ['Barbell'],
                'video_url' => 'https://www.youtube.com/watch?v=op9kVnSso6Q',
                'description' => 'Raja dari semua latihan — deadlift melatih seluruh posterior chain termasuk punggung, glutes, dan hamstring.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri dengan kaki selebar pinggul</li><li>Barbell tepat di atas tengah kaki</li><li>Bungkukkan badan, pegang barbell dengan grip sedikit lebih lebar dari kaki</li><li>Dada tegak, punggung lurus, bahu sedikit di depan barbell</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik napas dalam, kencangkan core</li><li>Dorong melalui tumit, angkat barbell di sepanjang tulang kering</li><li>Luruskan pinggul dan lutut bersamaan</li><li>Berdiri tegak di posisi akhir, bahu ke belakang</li><li>Turunkan dengan kontrol — tekuk pinggul dulu, lalu lutut</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Punggung membulat</strong> — PERTAHANKAN punggung netral/lurus. Kurangi beban.</li><li><strong>❌ Barbell terlalu jauh dari tubuh</strong> — Barbell harus menyentuh/menempel di tulang kering sepanjang gerakan.</li><li><strong>❌ Mengangkat dengan punggung, bukan kaki</strong> — Inisiasi gerakan dari kaki, bukan punggung bawah.</li><li><strong>❌ Menjatuhkan beban di turunan</strong> — Turunkan dengan kontrol penuh.</li></ul>',
            ],
            [
                'muscle_slug' => 'punggung',
                'title' => 'Pull Up',
                'type' => 'gym',
                'equipment' => ['Pull Up Bar'],
                'video_url' => 'https://www.youtube.com/watch?v=eGo6WgA7H2S',
                'description' => 'Latihan bodyweight fundamental untuk punggung atas dan lengan. Salah satu indikator kekuatan tubuh atas.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Gantung di pull up bar dengan grip pronasi (telapak tangan menjauh)</li><li>Genggaman sedikit lebih lebar dari bahu</li><li>Lengan lurus penuh</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik napas, aktifkan punggung (scapular retraction)</li><li>Tarik tubuh ke atas hingga dagu melewati bar</li><li>Tahan sejenak di puncak</li><li>Turunkan tubuh perlahan hingga lengan lurus kembali</li></ul><p><strong>3. Tips</strong></p><ul><li>Jangan mengayun — kontrol penuh</li><li>Fokus pada menarik dari siku, bukan tangan</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Mengayun (kipping)</strong> — Gunakan strict form, jangan gunakan momentum.</li><li><strong>❌ Grip terlalu lebar</strong> — Cukup sedikit lebih lebar dari bahu.</li><li><strong>❌ Tidak turun sepenuhnya</strong> — Luruskan lengan penuh di setiap rep.</li></ul>',
            ],
            [
                'muscle_slug' => 'punggung',
                'title' => 'Barbell Row',
                'type' => 'gym',
                'equipment' => ['Barbell'],
                'video_url' => 'https://youtu.be/bm0_q9bR_HA?si=NekF7voLBAc8lvej',
                'description' => 'Row dengan barbell untuk melatih punggung tengah dan latissimus. Komplemen sempurna untuk bench press.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri dengan kaki selebar pinggul</li><li>Bungkukkan badan 45 derajat ke depan, punggung lurus</li><li>Pegang barbell dengan grip pronasi</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik barbell ke arah perut bagian bawah</li><li>Rapatkan tulang belikat (scapulae) di puncak</li><li>Turunkan barbell perlahan hingga lengan lurus</li></ul><p><strong>3. Tips</strong></p><ul><li>Pertahankan posisi punggung netral</li><li>Jangan berdiri terlalu tegak — semakin horizontal, semakin efektif</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Terlalu tegak</strong> — Badan harus condong setidaknya 45 derajat.</li><li><strong>❌ Menggunakan momentum dari kaki</strong> — Hanya tangan dan punggung yang menarik.</li><li><strong>❌ Menarik terlalu tinggi (ke dada)</strong> — Arahkan barbell ke perut bawah, bukan dada.</li></ul>',
            ],
            [
                'muscle_slug' => 'punggung',
                'title' => 'Dumbbell Row',
                'type' => 'gym',
                'equipment' => ['Dumbbell', 'Bench'],
                'description' => 'One-arm row untuk isolasi otot punggung sisi kanan dan kiri. Memperbaiki ketidakseimbangan otot.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Satu lutut dan tangan menumpu di bangku</li><li>Kaki lainnya di lantai</li><li>Punggung sejajar lantai</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik dumbbell ke arah pinggang</li><li>Sikut melewati punggung di puncak</li><li>Turunkan perlahan — rasakan regangan di punggung</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Memutar badan saat menarik</strong> — Jaga torso stabil, hanya lengan yang bergerak.</li><li><strong>❌ Menjatuhkan beban</strong> — Fase turun (eccentric) harus terkontrol.</li></ul>',
            ],
            [
                'muscle_slug' => 'punggung',
                'title' => 'Superman Hold',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Latihan isometrik untuk menguatkan punggung bawah (erector spinae) tanpa alat.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Tengkurap di lantai/matras</li><li>Tangan lurus ke depan, kaki lurus ke belakang</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Angkat tangan, dada, dan kaki dari lantai secara bersamaan</li><li>Tahan posisi 2-5 detik</li><li>Turunkan perlahan</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Angkat terlalu tinggi</strong> — Cukup 5-10 cm dari lantai, fokus pada kontraksi.</li><li><strong>❌ Menahan napas</strong> — Tetap bernapas normal selama hold.</li></ul>',
            ],

            // ==================== KAKI (Legs) ====================
            [
                'muscle_slug' => 'kaki',
                'title' => 'Barbell Squat',
                'type' => 'gym',
                'equipment' => ['Barbell'],
                'video_url' => 'https://youtu.be/-bJIpOq-LWk?si=J62FxEHLlV7oMFZz',
                'description' => 'Squat adalah gerakan compound utama untuk membangun kaki, glutes, dan core strength.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Posisikan barbell di rak setinggi dada atas</li><li>Masuk di bawah barbell, letakkan di atas trapezius (bukan di leher)</li><li>Angkat barbell dari rak, langkah mundur 1-2 langkah</li><li>Kaki selebar bahu, jari kaki sedikit keluar</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tarik napas dalam, kencangkan core</li><li>Turunkan tubuh dengan menekuk lutut dan pinggul</li><li>Jaga dada tetap tegak — jangan membungkuk</li><li>Turun hingga paha sejajar atau di bawah sejajar lantai</li><li>Dorong melalui tumit untuk kembali berdiri</li></ul><p><strong>3. Tips</strong></p><ul><li>Lutut searah jari kaki, jangan collapse ke dalam</li><li>Pertahankan berat di tumit dan bagian tengah kaki</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Punggung membulat di bagian bawah</strong> — Jaga dada tegak, kurangi kedalaman jika perlu.</li><li><strong>❌ Lutut collapse ke dalam (valgus)</strong> — Dorong lutut keluar, searah jari kaki.</li><li><strong>❌ Tumit terangkat</strong> — Fleksibilitas ankle mungkin terbatas, gunakan sepatu weightlifting atau tambah elevasi tumit.</li><li><strong>❌ Setengah squat (quarter squat)</strong> — Minimal sejajar (parallel), idealnya di bawah sejajar.</li></ul>',
            ],
            [
                'muscle_slug' => 'kaki',
                'title' => 'Leg Press',
                'type' => 'gym',
                'equipment' => ['Cable Machine'],
                'description' => 'Alternatif squat menggunakan mesin. Ideal untuk pemula atau saat ingin fokus beban berat tanpa stabilitas core.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Duduk di mesin leg press</li><li>Punggung dan kepala menempel di sandaran</li><li>Kaki selebar bahu di platform, jari kaki lurus</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Lepaskan safety, turunkan platform perlahan</li><li>Lutut mendekati dada (90 derajat atau lebih)</li><li>Dorong kembali tanpa mengunci lutut penuh</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Mengunci lutut (hyperextension)</strong> — Hentikan tepat sebelum lutut terkunci penuh.</li><li><strong>❌ Posisi kaki terlalu rendah</strong> — Berisiko cedera lutut, posisikan kaki di tengah platform.</li></ul>',
            ],
            [
                'muscle_slug' => 'kaki',
                'title' => 'Dumbbell Lunges',
                'type' => 'gym',
                'equipment' => ['Dumbbell'],
                'description' => 'Gerakan unilateral untuk melatih keseimbangan kaki, glutes, dan quadriceps. Memperbaiki ketidakseimbangan kiri-kanan.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri tegak, pegang dumbbell di samping</li><li>Kaki selebar pinggul</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Langkahkan satu kaki ke depan</li><li>Turunkan tubuh hingga kedua lutut 90 derajat</li><li>Lutut belakang hampir menyentuh lantai</li><li>Dorong melalui tumit depan untuk kembali</li><li>Ganti kaki setiap repetisi</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Lutut depan melewati jari kaki</strong> — Langkah cukup panjang agar lutut tidak over-extend.</li><li><strong>❌ Badan condong ke depan</strong> — Jaga torso tetap tegak.</li></ul>',
            ],
            [
                'muscle_slug' => 'kaki',
                'title' => 'Romanian Deadlift',
                'type' => 'gym',
                'equipment' => ['Barbell'],
                'description' => 'Variasi deadlift untuk fokus pada hamstring dan glutes. Gerakan dimulai dari posisi berdiri, bukan dari lantai.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri dengan kaki selebar pinggul</li><li>Pegang barbell di depan paha, grip pronasi</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tekuk sedikit lutut (tetap di posisi itu)</li><li>Dorong pinggul ke belakang, turunkan barbell</li><li>Pertahankan punggung lurus</li><li>Rasakan regangan di hamstring</li><li>Kembali berdiri dengan mendorong pinggul ke depan</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Menekuk lutut terlalu banyak</strong> — Ini bukan squat. Lutut hanya sedikit ditekuk dan tetap.</li><li><strong>❌ Membulatkan punggung</strong> — Dada tegak, punggung netral sepanjang gerakan.</li></ul>',
            ],
            [
                'muscle_slug' => 'kaki',
                'title' => 'Bodyweight Squat',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Squat tanpa beban untuk pemula — fondasi untuk mempelajari teknik squat yang benar.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri dengan kaki selebar bahu</li><li>Jari kaki sedikit keluar</li><li>Tangan lurus ke depan atau di belakang kepala</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Turunkan tubuh seperti akan duduk di kursi</li><li>Dada tegak, punggung lurus</li><li>Turun hingga paha sejajar lantai</li><li>Dorong melalui tumit, kembali berdiri</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Punggung membulat</strong> — Jaga dada tegak dan pandangan ke depan.</li><li><strong>❌ Tumit terangkat</strong> — Distribusikan berat ke tumit, bukan jari kaki.</li></ul>',
            ],
            [
                'muscle_slug' => 'kaki',
                'title' => 'Glute Bridge',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Latihan isolasi glutes yang bisa dilakukan di mana saja. Cocok untuk aktivasi glutes sebelum latihan utama.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berbaring telentang di lantai</li><li>Lutut ditekuk, kaki menapak lantai</li><li>Tangan di samping tubuh</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Dorong pinggul ke atas, kontraksikan glutes</li><li>Tahan di puncak 1-2 detik</li><li>Turunkan perlahan — jangan sentuh lantai</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Over-extend punggung bawah</strong> — Gerakan berasal dari glutes, bukan punggung.</li><li><strong>❌ Kaki terlalu jauh dari tubuh</strong> — Posisikan kaki dekat dengan glutes untuk ROM optimal.</li></ul>',
            ],

            // ==================== LENGAN (Arms) ====================
            [
                'muscle_slug' => 'lengan',
                'title' => 'Barbell Curl',
                'type' => 'gym',
                'equipment' => ['Barbell', 'EZ Curl Bar'],
                'video_url' => 'https://youtu.be/dDI8ClxRS04?si=oIMwuD6olW-XzN_O',
                'description' => 'Gerakan fundamental untuk biceps. Bisa menggunakan barbell lurus atau EZ curl bar untuk kenyamanan pergelangan tangan.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri tegak, pegang barbell dengan grip supinasi (telapak menghadap ke atas)</li><li>Kaki selebar bahu, siku di samping tubuh</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Curl barbell ke arah bahu</li><li>Hanya lengan bawah yang bergerak</li><li>Siku tetap di samping — jangan bergerak</li><li>Kontraksikan biceps di puncak</li><li>Turunkan perlahan hingga lengan lurus</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Mengayun (cheat curl)</strong> — Tubuh harus diam. Jika perlu mengayun, beban terlalu berat.</li><li><strong>❌ Siku bergerak ke depan</strong> — Siku harus terkunci di samping tubuh.</li><li><strong>❌ Setengah ROM</strong> — Luruskan lengan penuh di bawah, curl penuh di atas.</li></ul>',
            ],
            [
                'muscle_slug' => 'lengan',
                'title' => 'Dumbbell Curl',
                'type' => 'gym',
                'equipment' => ['Dumbbell'],
                'description' => 'Variasi curl dengan dumbbell untuk isolasi biceps kiri-kanan secara mandiri.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berdiri atau duduk, pegang dumbbell di samping</li><li>Telapak tangan menghadap ke depan</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Curl satu atau kedua dumbbell ke arah bahu</li><li>Supinasi pergelangan di puncak (twist pinky ke atas)</li><li>Turunkan perlahan dengan kontrol</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Bahu ikut terangkat</strong> — Jaga bahu tetap turun, hanya biceps yang bekerja.</li></ul>',
            ],
            [
                'muscle_slug' => 'lengan',
                'title' => 'Tricep Pushdown',
                'type' => 'gym',
                'equipment' => ['Cable Machine'],
                'description' => 'Gerakan isolasi triceps menggunakan cable machine dengan rope atau straight bar attachment.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Atur kabel di posisi tinggi</li><li>Pegang rope attachment, siku di samping tubuh 90°</li><li>Berdiri tegak, sedikit condong ke depan</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Dorong rope ke bawah, luruskan lengan</li><li>Pisahkan rope di bagian bawah (jika pakai rope)</li><li>Kontraksikan triceps di posisi bawah</li><li>Kembali perlahan ke posisi awal</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Siku bergerak maju-mundur</strong> — Siku harus diam di samping tubuh.</li><li><strong>❌ Terlalu banyak beban</strong> — Gunakan beban yang memungkinkan full ROM.</li></ul>',
            ],
            [
                'muscle_slug' => 'lengan',
                'title' => 'Bench Dips',
                'type' => 'gym',
                'equipment' => ['Bench'],
                'description' => 'Dips di bangku untuk melatih triceps tanpa alat khusus. Bisa dilakukan di mana saja.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Duduk di tepi bangku, tangan di samping pinggul</li><li>Jari tangan menghadap ke depan</li><li>Kaki lurus ke depan (atau ditekuk untuk lebih mudah)</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Turunkan tubuh dengan menekuk siku ke belakang</li><li>Siku 90 derajat di posisi bawah</li><li>Dorong kembali ke atas, kontraksikan triceps</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Terlalu jauh dari bangku</strong> — Jaga pinggul dekat dengan bangku.</li><li><strong>❌ Turun terlalu dalam</strong> — Berhenti saat siku 90°, jangan lebih.</li></ul>',
            ],
            [
                'muscle_slug' => 'lengan',
                'title' => 'Diamond Push Up',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Push up dengan tangan membentuk diamond untuk fokus pada triceps. Variasi bodyweight yang menantang.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Posisi push up standar</li><li>Tangan rapat di bawah dada, ibu jari dan telunjuk membentuk segitiga/diamond</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Turunkan tubuh, siku mengarah ke belakang</li><li>Dada mendekati tangan</li><li>Dorong kembali ke atas</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Siku melebar</strong> — Jaga siku dekat dengan tubuh.</li><li><strong>❌ Pinggul turun</strong> — Aktifkan core, pertahankan plank position.</li></ul>',
            ],

            // ==================== PERUT (Abs) ====================
            [
                'muscle_slug' => 'perut',
                'title' => 'Plank',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Latihan isometrik fundamental untuk core stability. Membangun kekuatan perut, punggung bawah, dan bahu.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Posisi push up, lalu turun ke lengan bawah</li><li>Siku tepat di bawah bahu</li><li>Tubuh lurus dari kepala hingga tumit</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Tahan posisi selama 20-60 detik</li><li>Kencangkan perut, glutes, dan paha depan</li><li>Bernapas normal sepanjang hold</li></ul><p><strong>3. Progresi</strong></p><ul><li>Mulai 20 detik, tambah 5 detik per sesi</li><li>Target: 60 detik plank sempurna</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Pinggul terlalu tinggi (pike)</strong> — Tubuh harus lurus, bukan segitiga.</li><li><strong>❌ Pinggul turun (sagging)</strong> — Aktifkan glutes dan core untuk menjaga alignment.</li><li><strong>❌ Menahan napas</strong> — Bernapaslah normal, jangan tahan napas.</li><li><strong>❌ Leher menunduk atau mendongak</strong> — Pandangan ke lantai, leher netral.</li></ul>',
            ],
            [
                'muscle_slug' => 'perut',
                'title' => 'Crunch',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Gerakan klasik untuk melatih rectus abdominis (six-pack). Fokus pada kontraksi, bukan kuantitas.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berbaring telentang, lutut ditekuk</li><li>Kaki menapak lantai</li><li>Tangan di belakang kepala (jangan menarik leher)</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Angkat bahu dari lantai — gerakan pendek dan terkontrol</li><li>Kontraksikan perut di puncak selama 1 detik</li><li>Turunkan perlahan — jangan sentuh lantai sepenuhnya</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Menarik leher dengan tangan</strong> — Tangan hanya menopang, tidak menarik. Dagu menjauh dari dada.</li><li><strong>❌ Gerakan terlalu besar (sit-up penuh)</strong> — Crunch adalah gerakan pendek, hanya angkat scapula dari lantai.</li></ul>',
            ],
            [
                'muscle_slug' => 'perut',
                'title' => 'Leg Raise',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Latihan efektif untuk otot perut bagian bawah. Bisa dilakukan di lantai atau menggantung di pull up bar.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Berbaring telentang, kaki lurus</li><li>Tangan di samping atau di bawah pinggul untuk menopang</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Angkat kedua kaki bersamaan, jaga tetap lurus</li><li>Angkat hingga 90 derajat atau setinggi mungkin</li><li>Turunkan perlahan — jangan sentuh lantai di bagian bawah</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Punggung bawah melengkung (arching)</strong> — Tekan punggung bawah ke lantai. Jika tidak bisa, tekuk sedikit lutut.</li><li><strong>❌ Menjatuhkan kaki</strong> — Turunkan dengan kontrol, fase eccentric sama pentingnya.</li></ul>',
            ],
            [
                'muscle_slug' => 'perut',
                'title' => 'Russian Twist',
                'type' => 'home',
                'equipment' => ['Bodyweight'],
                'description' => 'Latihan rotasi untuk melatih obliques (otot perut samping) dan core stability.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Duduk dengan lutut ditekuk, tumit di lantai</li><li>Condongkan badan 45 derajat ke belakang</li><li>Tangan dirapatkan di depan dada</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Putar torso ke kanan, kembali ke tengah</li><li>Putar torso ke kiri, kembali ke tengah</li><li>Itu 1 repetisi. Lakukan 10-15 reps per sisi</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Hanya tangan yang bergerak</strong> — Putar seluruh torso, bukan hanya tangan.</li><li><strong>❌ Punggung membulat</strong> — Jaga punggung lurus selama gerakan.</li></ul>',
            ],
            [
                'muscle_slug' => 'perut',
                'title' => 'Cable Crunch',
                'type' => 'gym',
                'equipment' => ['Cable Machine'],
                'video_url' => 'https://youtu.be/wBzU6_YJPEU?si=M-xFHMUE0glW1p8C',
                'description' => 'Crunch dengan cable untuk resistance progresif — ideal untuk menambah beban pada latihan perut.',
                'guide' => '<p><strong>1. Posisi Awal</strong></p><ul><li>Pasang rope attachment di posisi tinggi</li><li>Berlutut menghadap mesin, pegang rope di samping kepala</li></ul><p><strong>2. Gerakan</strong></p><ul><li>Bungkukkan badan ke bawah, kontraksikan perut</li><li>Round-kan punggung (spinal flexion) di posisi bawah</li><li>Kembali perlahan dengan kontrol</li></ul>',
                'common_mistakes' => '<ul><li><strong>❌ Menggunakan pinggul</strong> — Gerakan berasal dari spine flexion, bukan dari pinggul.</li><li><strong>❌ Menarik dengan tangan</strong> — Tangan hanya sebagai pegangan, perut yang menggerakkan.</li></ul>',
            ],
        ];
    }
}
