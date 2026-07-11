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
| US & PB email reminder ditambahkan | ✅ / ❌ | ✅ / ❌ |
