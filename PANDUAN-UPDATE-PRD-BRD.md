# Panduan Update PRD & BRD — Fitur Baru

Dokumen ini berisi daftar perubahan yang perlu ditambahkan ke **PRD.md** dan **BRD.md**  
untuk mencerminkan fitur-fitur yang telah diimplementasikan namun belum terdokumentasi.

---

## Fitur yang Perlu Ditambahkan ke Dokumen

### 1. Email Reminder System — Pengingat Jadwal Latihan

**Deskripsi:** Sistem mengirim email pengingat setiap pagi kepada pengguna yang sudah mendaftar jadwal latihan dan belum menyelesaikan checklist hari itu.

---

## Yang Perlu Ditambah di BRD.md

### §5.2 Cakupan Fungsional — Tambahkan di bawah checklist jadwal:

```
- Menerima pengingat email setiap pagi untuk jadwal latihan yang belum diselesaikan.
```

### §6.3 Website Pengguna — Tambahkan setelah bagian "Checklist Jadwal":

```
### 6.?. Email Reminder (Pengingat Latihan)

- Pelanggan yang sudah mendaftar jadwal latihan menerima email pengingat setiap
  pagi pukul 07.00 WIB.
- Email berisi:
  - Nama jadwal hari ini
  - Daftar gerakan yang harus dilakukan
  - Link untuk membuka jadwal di website
  - Link kontak Admin
- Pengingat hanya dikirim untuk hari yang belum dicentang (is_checked = false).
- Pengingat berhenti setelah hari dicentang.
```

### §6.5 Dashboard Admin — Tidak ada perubahan (reminder otomatis, tidak ada UI Admin tambahan).

### §9 Tabel Database — Tidak ada perubahan (tabel sudah ada, tidak ada kolom baru).

### §8.2 Batasan Sistem — Pastikan tidak bertentangan:

```
Kalimat existing: "Admin tidak perlu selalu standby karena konten utama (video, deskripsi) 
sudah tersedia secara statis di halaman website."

Ini tetap berlaku — email reminder adalah fitur otomatis, bukan interaksi manual Admin.
```

---

## Yang Perlu Ditambah di PRD.md

### §4 User Stories — Tambah di bawah US-11:

```
| US-?? | Pelanggan | Sebagai pelanggan, saya ingin mendaftar ke template jadwal latihan tertentu agar menerima pengingat email setiap pagi untuk jadwal yang belum saya selesaikan. | Membantu konsistensi latihan. |
```

### §5 Product Backlog — Tambah item baru:

```
| PB-?? | Subscribe Jadwal | Pelanggan dapat mendaftar ke template jadwal tertentu untuk menerima pengingat email otomatis | Medium | Iterasi 5 |
```

### §7 Spesifikasi Fitur — Tambah setelah §7.8 Checklist Jadwal:

```
### 7.9 Subscribe Jadwal (Mulai Jadwal)

**Aturan Fungsional:**
- Pelanggan yang sudah login dapat mengklik tombol "Mulai Jadwal" di halaman detail template jadwal
- Sistem membuat record JadwalPengguna untuk semua hari dalam template dengan status is_checked = false
- Pelanggan kemudian dapat mencentang setiap hari seiring menyelesaikan latihan
- Setelah subscribe, tombol "Mulai Jadwal" tidak muncul lagi di halaman tersebut

### 7.10 Email Reminder (Pengingat Latihan)

**Aturan Fungsional:**
- Cron job berjalan setiap pukul 07.00 WIB
- Sistem memeriksa semua pelanggan yang memiliki jadwal_pengguna dengan is_checked = false untuk urutan_hari yang sesuai hari ini
- Setiap pelanggan yang memenuhi kriteria menerima satu email pengingat
- Email berisi:
  - Nama pelanggan (personalized)
  - Nama hari dan daftar gerakan
  - Link "Buka Jadwal Saya" ke halaman schedules.index
  - Link kontak Admin
- Email tidak dikirim jika semua hari sudah dicentang
- Email tidak dikirim jika pelanggan belum mendaftar jadwal apapun

**Aturan Teknis:**
- Console command: `workout:send-reminders`
- Mailable class: `WorkoutReminderMail`
- Penentuan hari: menggunakan `urutan_hari` yang sama dengan `now()->dayOfWeekIso`
- Konsistensi: Senin = 1, Selasa = 2, ..., Minggu = 7
```

### §7.14 Cron Job (yang sudah ada) — Update bagian ini:

```
Sebelum: Cron Job berjalan setiap pukul 02.00 pagi untuk mengecek link YouTube.
Sesudah: 
  - Cron Job 02.00 — `workout:check-youtube-links` (cek link YouTube rusak)
  - Cron Job 07.00 — `workout:send-reminders` (kirim email pengingat latihan)
```

### §10 Acceptance Criteria — Tambah di bawah kriteria checklist jadwal:

```
- Pelanggan dapat mengklik "Mulai Jadwal" di halaman template dan semua hari muncul sebagai belum dicentang.
- Pelanggan menerima email pengingat setiap pukul 07.00 untuk hari yang belum dicentang.
- Pelanggan tidak menerima email pengingat jika semua hari sudah dicentang.
```

---

## 2. Saran/Kritik di Halaman FAQ

**(Jika belum ada di dokumen — per PRD, FAQ & Kirim Saran adalah satu halaman)**

### BRD.md

Pastikan di §6.3 Website Pengguna, bagian FAQ dan Saran sudah digabung:

```
### FAQ & Kirim Saran

- Melihat halaman FAQ publik yang berisi daftar pertanyaan dan jawaban anonim.
- Mengirimkan saran/kritik melalui formulir di halaman yang sama (bagian bawah FAQ).
- Formulir memiliki pilihan kategori: Teknis, Kritik Video/Deskripsi, Saran Gerakan Baru.
- Setelah pengiriman, sistem menampilkan konfirmasi di halaman yang sama.
```

---

## 3. Content Seeders — Konten Otomatis

**(Tambahan untuk dokumentasi bahwa konten bisa diisi otomatis)**

### PRD.md — Tambah di bagian MVP atau Setup:

```
### Data Awal (Content Seeders)

Sistem menyediakan seeder untuk mengisi konten awal secara otomatis:
- EquipmentSeeder: 9 alat workout
- MuscleGroupSeeder: 6 bagian otot
- WorkoutSeeder: 31 gerakan dengan panduan dan kesalahan umum
- TemplateJadwalSeeder: 3 template jadwal (Full Body 3x, PPL 6x, Home 4x)

Seeder dijalankan otomatis saat Docker container pertama kali start.
Data bisa diedit manual melalui Admin Panel setelahnya.
```

---

## Checklist Final — Pastikan Dokumen Konsisten

| Cek | BRD | PRD |
|-----|-----|-----|
| Email reminder disebut di fitur pengguna | ✅ / ❌ | ✅ / ❌ |
| Subscribe jadwal ada di backlog | ✅ / ❌ | ✅ / ❌ |
| Cron 07:00 disebut | ✅ / ❌ | ✅ / ❌ |
| FAQ & Saran digabung jadi 1 halaman | ✅ / ❌ | ✅ / ❌ |
| Content seeders disebut di setup | ✅ / ❌ | ✅ / ❌ |


---

## 4. REST API — Public Data Endpoint

**(Tambahan untuk dokumentasi API)**

### BRD.md — Tambah di §5.2 Cakupan Fungsional:

```
- Mengakses data workout, otot, jadwal, dan FAQ melalui REST API (JSON).
```

### BRD.md — Tambah section baru di §6:

```
### 6.7 REST API

Sistem menyediakan REST API endpoint untuk mengakses data publik:

| Method | Endpoint | Output |
|--------|----------|--------|
| GET | /api/muscles | List semua otot aktif (id, name, slug, description) |
| GET | /api/muscles/{slug} | Detail otot + daftar gerakan yang dipublikasi |
| GET | /api/workouts/{slug} | Detail gerakan: title, type, description, guide, common_mistakes, video_url, video_id, image, muscle_group, equipments |
| GET | /api/schedules | List template jadwal (id, nama_template, slug, deskripsi, jumlah_hari_per_minggu) |
| GET | /api/schedules/{slug} | Detail jadwal: semua hari + daftar gerakan per hari |
| GET | /api/faq | List FAQ publik (id, pertanyaan, jawaban, created_at) |
| POST | /api/saran | Kirim saran/kritik (body: kategori, pesan). Rate limited IP. |

Semua response mengembalikan format JSON:
{
  "success": true/false,
  "data": { ... },
  "message": "..." // untuk error
}

API bersifat public read-only — tidak memerlukan autentikasi untuk GET endpoints.
POST /api/saran memiliki rate limiting (3 request/jam per IP).
```

### PRD.md — Tambah di §4 User Stories:

```
| US-?? | Developer | Sebagai developer, saya ingin mengakses data workout melalui REST API agar dapat mengintegrasikan dengan aplikasi lain. | Memperluas jangkauan platform. |
```

### PRD.md — Tambah di §5 Product Backlog:

```
| PB-?? | REST API | Menyediakan REST API endpoint untuk data publik (otot, gerakan, jadwal, FAQ) | Medium | Iterasi 5 |
```

### PRD.md — Tambah di §7 Spesifikasi Fitur:

```
### 7.15 REST API

**Aturan Fungsional:**
- API endpoint dapat diakses tanpa autentikasi (public read-only)
- Data hanya mengembalikan konten yang dipublikasi (is_published = true, status = true)
- POST /api/saran memiliki rate limiting yang sama dengan form web
- Semua response dalam format JSON

**Aturan Teknis:**
- Controllers: app/Http/Controllers/Api/*
- Routes: routes/api.php
- Rate limiting: throttle:saran (3 request/jam/IP)
- Format response: {"success": bool, "data": mixed, "message": string}
```

### PRD.md — Update §7.13 Cron Job:

```
Penambahan:
- API endpoint untuk integrasi eksternal (mobile app, third-party).
```

### PRD.md — Update §10 Acceptance Criteria:

```
- GET /api/muscles mengembalikan list otot dalam format JSON.
- GET /api/workouts/{slug} mengembalikan detail gerakan termasuk video_id.
- GET /api/schedules mengembalikan list template jadwal.
- POST /api/saran menerima input dan mengembalikan 201 Created.
```
| US & PB email reminder ditambahkan | ✅ / ❌ | ✅ / ❌ |
