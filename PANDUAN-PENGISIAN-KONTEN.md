# Panduan Pengisian Konten — SimpleWorkout

Dokumen ini adalah panduan langkah-demi-langkah untuk mengisi konten di Admin Panel (`/admin`).  
**Urutan pengisian wajib mengikuti urutan di bawah** karena ada relasi antar data.

---

## Daftar Isi

1. [Equipment (Alat Workout)](#1-equipment-alat-workout)
2. [Muscle Groups (Bagian Otot)](#2-muscle-groups-bagian-otot)
3. [Workouts (Gerakan)](#3-workouts-gerakan)
4. [Template Jadwal](#4-template-jadwal)

---

## 1. Equipment (Alat Workout)

**Lokasi Admin:** Sidebar → Konten → Equipment  
**Tabel DB:** `equipment`  
**Navigasi Sort:** -2 (tampil paling atas di grup Konten)

### Kolom yang Harus Diisi

| Kolom | Tipe | Wajib | Keterangan |
|-------|------|-------|------------|
| Nama Alat | Text | ✅ | Nama alat, contoh: *Barbell*, *Dumbbell*, *Resistance Band* |
| Deskripsi | Textarea | ❌ | Deskripsi singkat alat (opsional) |
| Gambar Alat | File Upload | ❌ | Upload gambar alat, format: jpg/png/webp |

### Panduan Pengisian

Isi equipment **sebelum** mengisi workouts, karena setiap workout bisa memilih alat yang digunakan (relasi many-to-many).

### Contoh Data

| Nama Alat | Deskripsi |
|-----------|-----------|
| Barbell | Long bar with weight plates, standard for squats, bench press, deadlift |
| Dumbbell | Handheld weights, versatile for isolation exercises |
| Cable Machine | Pulley-based machine for constant tension exercises |
| Resistance Band | Elastic bands for warmup and assisted exercises |
| Kettlebell | Cast iron ball with handle, ideal for swings and dynamic moves |
| Bodyweight | No equipment needed, using your own body weight |
| Bench | Flat/adjustable bench for pressing and seated exercises |
| Pull Up Bar | Horizontal bar for pull/chin up exercises |
| EZ Curl Bar | Curved bar for bicep and tricep isolation |

---

## 2. Muscle Groups (Bagian Otot)

**Lokasi Admin:** Sidebar → Konten → Muscle Groups  
**Tabel DB:** `muscle_groups`  
**Navigasi Sort:** -1

### Kolom yang Harus Diisi

| Kolom | Tipe | Wajib | Keterangan |
|-------|------|-------|------------|
| Nama Bagian Otot | Text | ✅ | Nama otot, slug di-generate otomatis |
| Slug | Text | ✅ | Auto-generated dari Nama, jangan diubah manual |
| Icon Path | Text | ❌ | Path file SVG kustom (biarkan kosong, pakai default) |
| Status (Aktif) | Toggle | ✅ | `ON` = tampil di website, `OFF` = sembunyi |
| Deskripsi | Textarea | ❌ | Deskripsi otot, contoh latihan terkait |

### 6 Otot Standar (dari Seeder)

Seeder otomatis membuat 6 otot ini saat `php artisan db:seed`. Jika Anda isi manual, gunakan nama persis berikut karena icon SVG di-render berdasarkan slug:

| Nama | Slug (auto) | Deskripsi (dari seeder) |
|------|-------------|------------------------|
| Dada | `dada` | Otot pectoralis — Bench Press, Push Up, Chest Fly |
| Bahu | `bahu` | Otot deltoid — Shoulder Press, Lateral Raise, Front Raise |
| Punggung | `punggung` | Otot latissimus & trapezius — Pull Up, Deadlift, Barbell Row |
| Kaki | `kaki` | Otot quadriceps, hamstring, glutes — Squat, Leg Press, Lunges |
| Lengan | `lengan` | Otot biceps & triceps — Curl, Tricep Extension, Dips |
| Perut | `perut` | Otot abdominal — Plank, Crunch, Leg Raise |

> ⚠️ **Penting:** Icon di halaman "Peta Tubuh" (Beranda) menggunakan slug otot untuk memilih SVG.  
> Jika nama otot berbeda dari 6 di atas, icon akan menggunakan fallback default.

---

## 3. Workouts (Gerakan)

**Lokasi Admin:** Sidebar → Konten → Workouts  
**Tabel DB:** `workouts`  
**Navigasi Sort:** 0

### Kolom yang Harus Diisi

| Kolom | Tipe | Wajib | Keterangan |
|-------|------|-------|------------|
| Bagian Otot | Select | ✅ | Pilih muscle group (Dada/Bahu/dll) |
| Judul Workout | Text | ✅ | Nama gerakan. Slug di-generate otomatis |
| Slug | Text | ✅ | Auto-generated, jangan diubah manual |
| Tipe Workout | Select | ✅ | Pilih `Home Workout` atau `Gym Workout` |
| Alat Workout | Multi-Select | ❌ | Pilih alat yang digunakan (bisa >1) |
| Deskripsi Singkat | Textarea | ❌ | 1-2 kalimat deskripsi (tampil di kartu) |
| Panduan Gerakan | Rich Editor | ❌ | Step-by-step detail (bisa format HTML) |
| Kesalahan Umum | Rich Editor | ❌ | Daftar kesalahan yang sering terjadi |
| URL Video YouTube | Text | ❌ | Link YouTube, hanya terima youtube.com / youtu.be |
| Gambar Workout | File Upload | ❌ | Upload gambar gerakan |
| Tampilkan di Website | Toggle | ✅ | `ON` = tampil publik, `OFF` = draft |

### Panduan Pengisian

#### Tipe Workout
- **Home Workout** — gerakan yang bisa dilakukan di rumah tanpa alat gym
- **Gym Workout** — gerakan yang memerlukan alat gym

#### URL Video YouTube
Format yang diterima:
- `https://www.youtube.com/watch?v=VIDEO_ID`
- `https://youtu.be/VIDEO_ID`
- `https://youtube.com/embed/VIDEO_ID`

#### Panduan Gerakan (Step-by-Step) — Contoh Format

Gunakan Rich Editor untuk format rapi. Template:

```
1. **Posisi Awal**
   - Berdiri dengan kaki selebar bahu
   - Pegang barbell dengan grip selebar bahu

2. **Gerakan**
   - Turunkan tubuh secara perlahan hingga paha sejajar lantai
   - Jaga punggung tetap lurus
   - Dorong melalui tumit untuk kembali ke posisi awal

3. **Pernapasan**
   - Tarik napas saat menurunkan tubuh
   - Hembuskan saat mendorong ke atas
```

#### Kesalahan Umum — Contoh Format

```
- ❌ **Punggung membungkuk** — Jaga dada tetap tegak dan punggung lurus
- ❌ **Lutut melewati jari kaki** — Dorong pinggul ke belakang saat menurunkan tubuh
- ❌ **Tumit terangkat** — Pastikan berat badan di tumit, bukan di jari kaki
- ❌ **Napas ditahan** — Selalu bernapas teratur selama gerakan
```

### Contoh Data Workouts per Otot

#### Dada (Chest)

| Judul | Tipe | Alat |
|-------|------|------|
| Barbell Bench Press | Gym | Barbell, Bench |
| Dumbbell Chest Press | Gym | Dumbbell, Bench |
| Push Up | Home | Bodyweight |
| Incline Dumbbell Fly | Gym | Dumbbell, Bench |
| Cable Chest Fly | Gym | Cable Machine |

#### Bahu (Shoulders)

| Judul | Tipe | Alat |
|-------|------|------|
| Barbell Overhead Press | Gym | Barbell |
| Dumbbell Shoulder Press | Gym | Dumbbell, Bench |
| Lateral Raise | Gym | Dumbbell |
| Front Raise | Gym | Dumbbell |
| Pike Push Up | Home | Bodyweight |

#### Punggung (Back)

| Judul | Tipe | Alat |
|-------|------|------|
| Deadlift | Gym | Barbell |
| Pull Up | Gym | Pull Up Bar |
| Barbell Row | Gym | Barbell |
| Dumbbell Row | Gym | Dumbbell, Bench |
| Superman Hold | Home | Bodyweight |

#### Kaki (Legs)

| Judul | Tipe | Alat |
|-------|------|------|
| Barbell Squat | Gym | Barbell |
| Leg Press | Gym | Cable Machine |
| Dumbbell Lunges | Gym | Dumbbell |
| Romanian Deadlift | Gym | Barbell |
| Bodyweight Squat | Home | Bodyweight |
| Glute Bridge | Home | Bodyweight |

#### Lengan (Arms)

| Judul | Tipe | Alat |
|-------|------|------|
| Barbell Curl | Gym | Barbell, EZ Curl Bar |
| Dumbbell Curl | Gym | Dumbbell |
| Tricep Pushdown | Gym | Cable Machine |
| Bench Dips | Gym | Bench |
| Diamond Push Up | Home | Bodyweight |

#### Perut (Abs)

| Judul | Tipe | Alat |
|-------|------|------|
| Plank | Home | Bodyweight |
| Crunch | Home | Bodyweight |
| Leg Raise | Home | Bodyweight |
| Russian Twist | Home | Bodyweight |
| Cable Crunch | Gym | Cable Machine |

---

## 4. Template Jadwal

**Lokasi Admin:** Sidebar → Konten → Template Jadwal  
**Tabel DB:** `template_jadwal` → `hari_jadwal` → `detail_jadwal`  
**Navigasi Sort:** 1

### Kolom yang Harus Diisi

| Kolom | Tipe | Wajib | Keterangan |
|-------|------|-------|------------|
| Nama Template | Text | ✅ | Nama jadwal, contoh: *Full Body 3x Seminggu* |
| Slug | Text | ✅ | Auto-generated dari Nama |
| Deskripsi | Textarea | ❌ | Penjelasan singkat tentang jadwal ini |
| Jumlah Hari/Minggu | Number | ✅ | 1–7, jumlah hari latihan per minggu |

### Repeater: Daftar Hari

Setiap template berisi beberapa **hari**. Setiap hari memiliki:

| Kolom | Tipe | Wajib | Keterangan |
|-------|------|-------|------------|
| Nama Hari | Text | ✅ | Contoh: *Hari 1 — Push*, *Senin — Dada & Bahu* |
| Urutan Hari | Number | ✅ | 1, 2, 3, ... urutan tampil |

### Repeater: Gerakan di Hari Ini

Setiap hari berisi daftar **gerakan**:

| Kolom | Tipe | Wajib | Keterangan |
|-------|------|-------|------------|
| Gerakan | Select | ✅ | Pilih dari daftar workout yang sudah dipublikasi |
| Urutan | Number | ✅ | Urutan gerakan dilakukan (1, 2, 3, ...) |

### Panduan Pengisian

> ⚠️ **Workout harus diisi dulu** sebelum membuat template jadwal.  
> Hanya workout dengan status **Tampilkan di Website = ON** yang muncul di dropdown.

### Contoh Template Jadwal

#### Template 1: Full Body 3x Seminggu

| Hari | Gerakan |
|------|---------|
| Hari 1 — Push (Dada & Bahu) | 1. Barbell Bench Press, 2. Incline Dumbbell Press, 3. Dumbbell Shoulder Press, 4. Lateral Raise |
| Hari 2 — Pull (Punggung) | 1. Deadlift, 2. Pull Up, 3. Barbell Row, 4. Dumbbell Row |
| Hari 3 — Legs & Core | 1. Barbell Squat, 2. Dumbbell Lunges, 3. Plank, 4. Leg Raise |

*(Jumlah Hari/Minggu = 3)*

#### Template 2: Push / Pull / Legs (PPL)

| Hari | Gerakan |
|------|---------|
| Hari 1 — Push | 1. Barbell Bench Press, 2. Dumbbell Shoulder Press, 3. Tricep Pushdown, 4. Lateral Raise |
| Hari 2 — Pull | 1. Deadlift, 2. Pull Up, 3. Barbell Row, 4. Barbell Curl |
| Hari 3 — Legs | 1. Barbell Squat, 2. Romanian Deadlift, 3. Leg Press, 4. Dumbbell Lunges |
| Hari 4 — Push | 1. Dumbbell Chest Press, 2. Cable Chest Fly, 3. Front Raise, 4. Bench Dips |
| Hari 5 — Pull | 1. Dumbbell Row, 2. Cable Machine (lat pulldown), 3. EZ Curl Bar Curl, 4. Dumbbell Curl |
| Hari 6 — Legs & Abs | 1. Glute Bridge, 2. Bodyweight Squat, 3. Plank, 4. Crunch |

*(Jumlah Hari/Minggu = 6)*

#### Template 3: Home Workout 4x Seminggu

| Hari | Gerakan |
|------|---------|
| Hari 1 — Upper Body | 1. Push Up, 2. Pike Push Up, 3. Diamond Push Up, 4. Superman Hold |
| Hari 2 — Lower Body | 1. Bodyweight Squat, 2. Glute Bridge, 3. Dumbbell Lunges |
| Hari 3 — Core | 1. Plank, 2. Crunch, 3. Leg Raise, 4. Russian Twist |
| Hari 4 — Full Body | 1. Push Up, 2. Bodyweight Squat, 3. Superman Hold, 4. Plank |

*(Jumlah Hari/Minggu = 4)*

---

## Urutan Pengisian yang Benar

```
1. Equipment (Alat)           ← isi dulu
2. Muscle Groups (Otot)       ← seeder sudah isi 6 otot
3. Workouts (Gerakan)         ← pilih otot + alat
4. Template Jadwal            ← pilih hari + gerakan
```

---

## Catatan Tambahan

- **Slug** di semua konten digenerate otomatis dari kolom Nama/Judul — tidak perlu diisi manual
- **Gambar** bersifat opsional di semua konten, rekomendasi: 1200×630px (16:9)
- **Video YouTube** hanya untuk workouts — pastikan link masih aktif
- **Status Aktif / Tampilkan di Website** — gunakan untuk menyembunyikan konten yang masih draft
- **FAQ** diisi dari menu Moderasi → FAQ, bisa dipublikasikan dari halaman Saran/Kritik
- **Pengaturan Website** di menu Pengaturan — isi nama website, kontak, jam operasional
