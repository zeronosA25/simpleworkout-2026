## **BUSINESS REQUIREMENT DOCUMENT (BRD) Website Workout GYM untuk Pemula** 

**Sistem Tutorial Workout Untuk Pemula di GYM berbasis Web** 

## **1. Ringkasan Eksekutif** 

Dokumen Business Requirement Document (BRD) ini menjelaskan kebutuhan bisnis dan kebutuhan sistem untuk pengembangan aplikasi Website Tutorial Workout GYM Untuk Pemula, yaitu platform berbasis web yang digunakan untuk membantu pemula dalam mempelajari gerakan latihan kebugaran secara mandiri. Sistem ini dirancang untuk mempermudah pengguna (trainee) dalam mengakses materi gerakan berdasarkan bagian otot yang ingin dilatih, menonton video tutorial dari Youtube yang telah dikurasi, membaca deskripsi gerakan yang jelas dan aman, serta memperoleh saran jadwal latihan mingguan. 

**s** elain membantu pengguna, sistem juga mendukung pemilik usaha (Admin) dalam mengelola konten video, menulis deskripsi gerakan yang unik, menyusun template jadwal, serta menampung dan merespons saran atau kritik dari pengguna melalui halaman FAQ yang dinamis. Dengan adanya sistem ini, proses belajar gerakan gym yang sebelumnya dilakukan secara acak melalui pencarian Youtube tanpa panduan dapat dilakukan dalam satu platform yang terintegrasi, fleksibel (opsional), dan tetap dapat diakses kapan saja (24 jam) meskipun Admin sedang tidak aktif. 

## **2. Latar Belakang Dan Justifikasi Bisnis** 

## **2.1 Konteks** 

Website Tutorial Workout GYM Untuk Pemula merupakan platform jasa bimbingan kebugaran digital yang melayani kebutuhan pemula dalam mempelajari gerakan dasar gym seperti Squat, Bench Press, Deadlift, dan gerakan otot lainnya. Saat ini, calon pengguna biasanya mencari video tutorial secara acak di Youtube tanpa panduan deskripsi tertulis yang spesifik, tanpa kurasi gerakan yang aman, dan tanpa tempat untuk bertanya atau memberikan saran terhadap materi yang mereka pelajari. 

## **2.2 Permasalahan** 

- Pemula tidak tahu harus mencari gerakan apa terlebih dahulu karena kebingungan membedakan fungsi otot (dada, bahu, punggung, kaki). 

- Video Youtube yang tersedia sangat banyak dan tidak semuanya aman untuk pemula (seringkali menggunakan beban berat atau teknik yang terlalu advance). 

- Tidak ada deskripsi tertulis yang menyertai video secara spesifik menjelaskan posisi kaki, pernapasan, dan kesalahan umum yang sering terjadi. 

- Program latihan yang beredar di internet terlalu kaku (wajib mengikuti urutan A ke B), sehingga pemula cepat bosan dan menyerah. 

- Pengguna tidak memiliki saluran untuk menyampaikan kritik (misal: video terlalu cepat) atau meminta gerakan otot tertentu yang belum tersedia. 

- Admin (pemilik konten) kesulitan mengetahui konten mana yang perlu diperbaiki karena tidak ada sistem penampung saran yang terstruktur. 

1 

## **2.3 Solusi yang Diusulkan** 

Membangun sistem berbasis web untuk mendukung proses belajar gerakan gym secara terintegrasi dengan fitur: 

- Registrasi dan login pengguna. 

- List nama nama Latihan Otot untuk memilih otot yang ingin dilatih 

- Daftar gerakan spesifik untuk setiap otot. 

- Halaman detail gerakan yang berisi: 

- Embedded video dari Youtube. 

- Deskripsi UNIK (step-by-step) dan "Kesalahan Umum”. 

- Fitur checklist pada jadwal yang bersifat pribadi dan tidak mempengaruhi akses ke hari lain. 

- Halaman FAQ & Kirim Saran dalam satu halaman terpadu — FAQ publik, formulir saran/kritik, dan pencarian FAQ interaktif berbasis Livewire. 

- Dashboard Admin (CMS) untuk mengelola konten dan memoderasi seluruh saran/kritik dari pengguna. 

Manfaat yang diharapkan dari sistem ini antara lain: 

- Mempermudah pemula dalam mempelajari gerakan gym sesuai dengan otot yang ingin difokuskan. 

- Mengurangi risiko cedera karena gerakan disertai deskripsi kesalahan umum dan teknik yang aman. 

- Memberikan kebebasan belajar sehingga pengguna tidak bosan dan tetap betah. 

- Menyediakan saluran komunikasi bagi pengguna untuk memberikan saran perbaikan konten. 

- Membantu Admin mengetahui konten apa yang perlu ditambahkan atau diperbaiki melalui laporan saran dari pengguna. 

- Website tetap dapat diakses 24 jam sehari meskipun Admin hanya aktif pada jam kerja (Senin-Jumat, 08.00-17.00). 

## **3. Tujuan Bisnis** 

- Menyediakan platform belajar gerakan gym yang fleksibel dan mudah digunakan bagi pemula. 

- Membantu pengguna memahami teknik gerakan dengan benar melalui kombinasi video kurasi dari Youtube dan deskripsi tertulis yang spesifik (step-by-step + kesalahan umum) yang ditulis oleh Admin. 

- Mempermudah pengguna dalam memilih materi latihan berdasarkan bagian otot yang ingin difokuskan. 

- Menyediakan pilihan template jadwal latihan mingguan sebagai panduan bagi pengguna yang ingin latihan terstruktur. 

- Mendukung pengelolaan konten (video, deskripsi, jadwal) secara terpusat oleh Admin melalui dashboard CMS. 

- Menampung dan merespons saran/kritik dari pengguna sebagai bahan perbaikan dan pengembangan konten secara berkelanjutan. 

- Menjamin ketersediaan website 24 jam sehari tanpa ketergantungan pada jam kerja Admin (Senin–Jumat, 08.00–17.00). 

- Memberikan kebebasan belajar (non-linear / opsional) agar pengguna tidak merasa terpaksa mengikuti jalur yang kaku dan tetap termotivasi untuk belajar. 

2 

## **4. Ruang Lingkup** 

## **4.1 Dashboard Pelanggan** 

- Registrasi akun pelanggan. 

- Login dan logout pengguna. 

- Melihat Peta Tubuh / Grid visual yang menampilkan daftar nama-nama otot utama (Dada, Bahu, Punggung, Kaki, Lengan, Perut). 

- Melihat daftar gerakan yang tersedia untuk setiap otot yang dipilih. 

- Melihat halaman detail gerakan yang berisi: 

   - Embedded video dari Youtube (iframe) yang telah dikurasi oleh Admin. 

   - Deskripsi unik (step-by-step) cara melakukan gerakan yang ditulis oleh Admin. 

   - Daftar "Kesalahan Umum" (Common Mistakes) yang sering terjadi pada gerakan tersebut. 

- Melihat 3 template jadwal latihan statis yang telah disusun oleh Admin. 

- Setiap template jadwal menampilkan tabel hari (Senin–Minggu) beserta daftar nama gerakan sebagai panduan. 

- Memberi centang (checklist) pada setiap hari di jadwal sebagai catatan pribadi (bersifat opsional dan tidak mempengaruhi akses ke hari lain). 

- Melihat halaman FAQ & Kirim Saran yang menggabungkan daftar FAQ publik (dengan accordion pencarian Livewire) dan formulir saran/kritik dalam satu halaman terpadu.

- Mengirimkan saran/kritik melalui formulir dengan validasi real-time (Livewire) dan pilihan kategori: Teknis, Kritik Video/Deskripsi, Saran Gerakan Baru.

- Melihat informasi kontak Admin (email dan/atau nomor WhatsApp) yang tertera pada halaman website.

- Mendaftar (subscribe) ke template jadwal latihan untuk memulai program dan mengaktifkan pengingat email harian.

- Menerima pengingat email setiap pagi (07.00 WIB) via Gmail SMTP untuk hari jadwal yang belum dicentang.

- Melihat statistik real-time di landing page: total gerakan tersedia, total bagian otot, dan total template jadwal.

- Melihat hero section yang dipersonalisasi — sapaan nama untuk pengguna login, CTA generik untuk tamu.

- Menjelajahi gerakan dengan navigasi sebelumnya/selanjutnya (Livewire WorkoutNavigator) tanpa reload halaman.

- Menggunakan checklist jadwal via AJAX (Livewire ChecklistToggle) tanpa reload halaman.

## **4.2 Dashboard Admin** 

- Manajemen data pengguna (pelanggan) - melihat daftar pelanggan yang telah terdaftar. 

- • Manajemen data otot. 

- Manajemen data gerakan. 

- Manajemen deskripsi gerakan. 

- Manajemen link Youtube. 

- Manajemen template jadwal latihan. 

- Melihat daftar seluruh saran/kritik yang masuk dari pengguna beserta waktu pengirimannya. 

- Mengubah status saran/kritik. 

- Menulis balasan untuk setiap saran/kritik yang masuk. 

- Mempublikasikan jawaban atas pertanyaan teknis ke halaman FAQ secara anonim. 

- Mengelola informasi website (nama, logo, favicon, hero background, kontak, jam operasional).

- Mencari dan mengunduh gambar workout dari Pexels API langsung melalui Admin Panel.

- Mengelola tampilan website melalui pengaturan tema dan hero background image.

## **4.3 Pengelolaan Konten dan Saran** 

- Penyimpanan data otot, gerakan, deskripsi, dan link Youtube dalam database. 

- Penyimpanan template jadwal latihan dan daftar gerakan di dalamnya. 

- Penyimpanan seluruh saran/kritik dari pengguna beserta balasan Admin dan statusnya. 

- Penyimpanan seluruh pertanyaan dan jawaban yang dipublikasikan ke halaman FAQ. 

- Pengecekan otomatis terhadap seluruh link Youtube yang tersimpan untuk memastikan video masih aktif. Jika ditemukan link rusak, sistem akan mengirim notifikasi peringatan ke email Admin. 

3 

## **4.4 Tidak Masuk Ruang Lingkup** 

- Aplikasi mobile Android atau iOS (website hanya diakses melalui browser desktop/mobile). 

- Sistem pembayaran online atau integrasi dengan payment gateway. 

- Fitur konsultasi langsung (live chat, video call, atau Zoom) antara pengguna dan Admin. 

- Modul analitik perilaku pengguna (pelacakan durasi tonton, jumlah klik, laporan grafik, dsb.). 

- Sistem rekomendasi gerakan otomatis berbasis kecerdasan buatan (AI). 

- Integrasi dengan perangkat keras (alat gym, smartwatch, atau sensor gerak). 

- Program latihan yang dipersonalisasi secara otomatis oleh sistem berdasarkan data pengguna (semua konten bersifat statis dan dikelola manual oleh Admin). 

- Fitur komunitas atau forum diskusi antar pengguna. 

- ~~Sistem penjadwalan pengingat (reminder) latihan melalui email.~~ (Fitur ini SUDAH diimplementasikan — lihat §4.1 dan §6.9) 

## **5. Stakeholders dan Pengguna** 

|**Stakeholder**|**Peran dan Tanggung Jawab**|
|---|---|
|Pengguna(Pelanggan/trainee)|Melihat daftar otot yang tersedia, memilih otot yang ingin<br>dipelajari, melihat daftar gerakan untuk setiap otot,<br>menonton video tutorial dari Youtube yang telah dikurasi,<br>membaca deskripsi step-by-step dan kesalahan umum yang<br>ditulis oleh Admin, Melihat jadwal latihan, memberikan<br>centang (checklist) pada jadwal sebagai catatan pribadi,<br>mengirimkan saran/kritik melalui formulir, dan membaca<br>halaman FAQ publik.|
|Admin**(**Pemilik<br>Usaha/Pengelola Konten)|Mengelola data otot. Mengelola data gerakan. Mengelola<br>deskripsi gerakan. Mengelola link Youtube untuk setiap<br>gerakan. Mengelola template jadwal latihan. Melihat daftar<br>seluruh saran/kritik yang masuk dari pengguna. Mengubah<br>status saran/kritik. Menulis balasan untuk setiap<br>saran/kritik. Mempublikasikan jawaban atas pertanyaan<br>teknis ke halaman FAQ secara anonim. Mengelola<br>informasi website (termasuk hero background, logo, favicon).<br>Mencari dan mengunduh gambar workout dari Pexels API.<br>Memastikan seluruh link Youtube yang<br>tersimpan masih aktif melalui pengecekan otomatis harian.|



## **6. Persyaratan Fungsional** 

## **6.1 Website Pengguna(Workout Tutorial dan Vidio)** 

- Registrasi akun pengguna. 

- Login dan logout pengguna. 

- Melihat Peta Tubuh / Grid visual yang menampilkan daftar nama-nama otot utama. 

- Melihat daftar gerakan yang tersedia untuk setiap otot yang dipilih. 

- Melihat halaman detail gerakan yang berisi: 

   - Embedded video dari Youtube yang telah dikurasi oleh Admin. 

   - Deskripsi unik (step-by-step) cara melakukan gerakan yang ditulis oleh Admin. 

4 

   - Daftar "Kesalahan Umum" yang sering terjadi pada  gerakan tersebut. 

- Pengguna dapat dengan bebas berpindah dari satu otot ke otot lain atau dari satu gerakan ke gerakan lain tanpa batasan atau syarat apapun. 

- Informasi kontak Admin tertera pada halaman website. 

## **6.2 Website Pengguna (Jadwal Latihan)** 

- Melihat template jadwal latihan statis yang telah disusun oleh Admin. 

- Setiap template jadwal menampilkan tabel hari (Senin–Minggu) beserta daftar nama gerakan sebagai panduan. 

- Memberi centang (checklist) pada setiap hari di jadwal sebagai catatan pribadi. 

- Checklist disimpan per akun pengguna sehingga dapat dilihat kembali ketika pengguna login Kembali 

## **6.3 Website Pengguna (FAQ & Kirim Saran)** 

- Melihat halaman FAQ & Kirim Saran yang menggabungkan FAQ publik dan formulir saran/kritik dalam satu halaman terpadu.

- FAQ ditampilkan dalam format accordion interaktif (Livewire) yang dapat dibuka/tutup.

- Fitur pencarian FAQ untuk menemukan pertanyaan dengan cepat (Livewire).

- Mengirimkan saran/kritik melalui formulir Livewire dengan validasi real-time dan pilihan kategori: Teknis, Kritik Video/Deskripsi, Saran Gerakan Baru.

- Formulir saran/kritik memiliki pembatasan pengiriman (rate limiting 3x/jam/IP) untuk mencegah penyalahgunaan.

- Setelah pengguna mengirimkan saran/kritik, sistem menampilkan konfirmasi bahwa pesan telah berhasil dikirim dan akan diproses oleh Admin.

## **6.4 Dashboard Admin (Manajemen Konten)** 

- Login khusus Admin untuk mengakses dashboard CMS. 

- Manajemen data otot. 

- Manajemen data gerakan. 

- Manajemen deskripsi gerakan. 

- Manajemen link Youtube. 

- Manajemen template jadwal latihan. 

- Manajemen informasi website. 

## **6.5 Dashboard Admin (Moderasi Saran/Kritik & FAQ)** 

- Melihat daftar seluruh saran/kritik yang masuk dari pengguna beserta waktu pengiriman dan kategori. 

- Mengubah status saran/kritik menjadi: 

   - Pending (baru masuk, menunggu dibaca) 

   - On-Progress (sedang diproses/dibaca oleh Admin) 

   - Resolved (sudah dibalas dan ditindaklanjuti) 

- Menulis balasan untuk setiap saran/kritik yang masuk. 

- Mempublikasikan jawaban atas pertanyaan atau saran yang bersifat teknis ke halaman FAQ secara anonim. 

- Menghapus atau menyembunyikan jawaban FAQ yang sudah tidak relevan jika diperlukan. 

5 

## **6.6 Dashboard Admin (Pemeliharaan dan Pengecekan Link)** 

- Pengecekan otomatis (Cron Job harian) terhadap seluruh link Youtube yang tersimpan untuk memastikan video masih aktif (tidak dihapus, tidak diprivate, dan masih dapat diakses). 

- Jika ditemukan link yang rusak atau tidak dapat diakses, sistem akan mengirim notifikasi peringatan ke email Admin. 

- Admin dapat melihat daftar link yang bermasalah melalui dashboard untuk segera diperbaiki atau diganti dengan video alternatif. 

6 

## **6.7 REST API (Public Data Endpoint)**

Sistem menyediakan REST API endpoint untuk akses data publik dalam format JSON:

| Method | Endpoint | Fungsi |
|--------|----------|--------|
| GET | `/api/muscles` | List semua otot aktif |
| GET | `/api/muscles/{slug}` | Detail otot + daftar gerakan |
| GET | `/api/workouts/{slug}` | Detail gerakan lengkap (guide, video_id, mistakes) |
| GET | `/api/schedules` | List template jadwal |
| GET | `/api/schedules/{slug}` | Detail jadwal + hari + gerakan |
| GET | `/api/faq` | List FAQ publik |
| POST | `/api/saran` | Kirim saran/kritik (rate limited 3x/jam/IP) |

Semua endpoint GET bersifat public (tanpa autentikasi). Response format: `{"success": bool, "data": mixed}`.

## **6.8 Integrasi Pexels API**

Sistem terintegrasi dengan Pexels API (https://www.pexels.com/api) untuk pencarian gambar workout:

- Admin dapat mencari gambar workout berdasarkan kata kunci di form WorkoutResource (Filament).
- Sistem mengambil hasil pencarian dari Pexels API, mengunduh gambar pertama, dan menyimpannya ke storage.
- Setiap gambar menyertakan atribusi: "Foto oleh [photographer] di Pexels".
- Rate limit: 200 request/jam, 20.000 request/bulan.

## **6.9 Email Reminder (Pengingat Jadwal Latihan)**

Sistem mengirim email pengingat otomatis setiap pagi menggunakan Gmail SMTP:

- Pelanggan yang sudah mendaftar (subscribe) template jadwal menerima email pengingat setiap pukul 07.00 WIB.
- Email berisi: nama jadwal hari ini, daftar gerakan, link ke jadwal di website, dan link kontak Admin.
- Pengingat hanya dikirim untuk hari yang belum dicentang (is_checked = false).
- Pengiriman email menggunakan Gmail SMTP (smtp.gmail.com port 587 TLS).

## **6.10 Komponen Interaktif (Livewire)**

Sistem menggunakan Livewire v3 untuk komponen interaktif tanpa page reload:

| Komponen | Fungsi |
|----------|--------|
| MuscleGrid | Filter gerakan berdasarkan tipe (Gym/Home) di halaman detail otot |
| ChecklistToggle | Toggle centang jadwal secara AJAX tanpa reload halaman |
| SaranForm | Formulir saran/kritik dengan validasi real-time dan konfirmasi inline |
| FaqAccordion | Akordeon FAQ dengan fitur pencarian dan toggle buka/tutup |
| WorkoutNavigator | Navigasi gerakan sebelumnya/selanjutnya tanpa reload halaman |

## **6.11 Landing Page & Identitas Visual**

Sistem menerapkan identitas visual yang konsisten:

- **Dark Gym Theme:** Seluruh halaman publik menggunakan tema gelap (bg-slate-950/900) dengan aksen oranye (#F97365) untuk elemen interaktif.
- **Hero Background:** Admin dapat mengatur gambar latar belakang hero melalui Pengaturan Website.
- **Personalized Hero:** Hero section menampilkan sapaan personal untuk pengguna login ("Halo, [Nama]!") dan tagline untuk tamu.
- **Stats Counter:** Menampilkan 3 metrik real-time: total gerakan, total otot, dan total template jadwal.
- **Avatar Dropdown:** Pengguna login melihat avatar dengan inisial nama di navbar (Alpine.js dropdown).
- **Custom SW Logo:** Logo SVG kustom dengan barbell dan inisial "SW".

## **7. Persyaratan Non-Fungsional (Kualitatif)** 

- Keamanan Data: Data pengguna (nama, email, password) serta data saran/kritik hanya dapat diakses oleh pengguna, Admin dapat mengakses seluruh data untuk keperluan moderasi dan pengelolaan konten). 

- Reliabilitas: Sistem dapat menyimpan data otot, gerakan, deskripsi, link Youtube, jadwal, saran/kritik, dan FAQ dengan baik sehingga dapat diakses kembali ketika dibutuhkan. Sistem juga melakukan pengecekan otomatis terhadap link Youtube setiap hari untuk memastikan ketersediaan video. 

- Kemudahan Penggunaan: Tampilan sistem dibuat sederhana dan intuitif agar mudah digunakan oleh pelanggan pemula yang mungkin tidak terbiasa dengan aplikasi web kompleks. Navigasi antar otot dan gerakan dibuat semenarik dan sesederhana mungkin. Pengalaman interaktif dengan Livewire (formulir real-time, accordion, checklist AJAX) memberikan UX yang responsif tanpa reload halaman. 

- Kinerja Sistem: Sistem mampu menampilkan informasi otot, daftar gerakan, halaman detail video, jadwal, dan FAQ dengan waktu akses yang wajar karena konten bersifat statis dan tidak membebani server dengan proses analitik berat. 

- Pemeliharaan: Data otot, gerakan, deskripsi, link Youtube, jadwal, dan informasi website dapat diperbarui oleh Admin melalui dashboard CMS tanpa mengubah kode program. 

- Kompatibilitas: Sistem dapat diakses melalui browser modern pada perangkat komputer maupun smartphone (responsif/mobile-friendly). 

- Ketersediaan: Sistem harus dapat diakses 24 jam sehari, 7 hari seminggu, tanpa tergantung pada jam kerja Admin. 

## **8. Arsitektur Tingkat Tinggi**

- **Back-end** : Laravel (PHP Framework)
- **Admin Panel** : Filament v3 + Hasnayeen Themes Plugin
- **Front-end** : Blade, HTML, CSS (Tailwind), JavaScript (Alpine.js), Livewire v3
- **Database** : MariaDB (MySQL-compatible)
- **Email** : Gmail SMTP (smtp.gmail.com:587 TLS)
- **External API** : Pexels API (gambar workout)
- **Containerization** : Docker (Nginx, PHP-FPM 8.3, MariaDB 10.11)

- **Panel/Admin UI** : Filament (Admin Panel Builder untuk Laravel) 

- **Database** : MariaDB / MySQL 

- **Front-end** : Blade, HTML, CSS, JavaScript 

- **Web Server** : Nginx 

- **Containerization** : Docker 

- **Version Control** : Git dan GitHub 

- **Development Environment** : WSL dan Visual Studio Code 

- **URL Lokal Pengembangan** : https://simpleworkout.test 

## **9. Model Data (Ringkas)** 

## **9.1 Data Pengguna dan Akses** 

- users: id, name, email, password, role (enum: 'pelanggan', 'admin'), created_at, updated_at 

## **9.2 Data Otot dan Gerakan** 

- otot: id, nama_otot (contoh: Dada, Bahu, Punggung), slug, deskripsi_singkat, icon_path (untuk peta tubuh visual), status (aktif/tidak aktif), created_at, updated_at 

7 

- gerakan: id, otot_id (foreign key ke tabel otot), nama_gerakan (contoh: Bench Press), slug, youtube_url (link video), status (aktif/tidak aktif), created_at, updated_at 

- deskripsi_gerakan: id, gerakan_id (foreign key), step_by_step (TEXT, berisi langkahlangkah melakukan gerakan), common_mistakes (TEXT, berisi daftar kesalahan umum), created_by_admin_id, updated_at 

## **9.3 Data Template Jadwal** 

- template_jadwal: id, nama_template (contoh: 3x/Minggu Full Body), slug, deskripsi, jumlah_hari_per_minggu, created_at, updated_at 

- hari_jadwal: id, template_jadwal_id (foreign key), nama_hari (Senin, Selasa, ..., Minggu), urutan_hari (1-7) 

- detail_jadwal: id, hari_jadwal_id (foreign key), gerakan_id (foreign key), urutan_gerakan (untuk urutan tampilan di hari tersebut) 

## **9.4 Data Jadwal Pribadi Pengguna (Checklist)** 

- jadwal_pengguna: id, user_id, hari_jadwal_id, is_checked (boolean, true jika dicentang), checked_at (timestamp), created_at, updated_at 

- Catatan: Tabel ini hanya menyimpan data checklist pengguna. Tidak ada logika yang membatasi akses ke hari lain berdasarkan is_checked. 

## **9.5 Data Saran, Kritik, dan FAQ** 

- saran_kritik: id, user_id (foreign key), kategori (enum: 'Teknis', 'Kritik Video/Deskripsi', 'Saran Gerakan Baru'), pesan (TEXT), status (enum: 'Pending', 'On-Progress', 'Resolved'), balasan_admin (TEXT, nullable), resolved_at (timestamp, nullable), created_at, updated_at 

- faq: id, pertanyaan (TEXT), jawaban (TEXT), is_published (boolean), created_from_saran_id (foreign key ke tabel saran_kritik, untuk pelacakan asal usul FAQ), created_at, updated_at 

## **9.6 Data Pengaturan Website** 

- pengaturan_website: id, nama_website, logo, favicon, hero_title, hero_subtitle, hero_background_url (nullable, URL gambar untuk hero section), nomor_whatsapp_admin, email_admin, alamat_fisik (opsional), jam_operasional (teks), deskripsi_singkat_website, created_at, updated_at 

## **10. Alur Proses Bisnis (Ringkas)** 

- Pengguna melakukan registrasi akun atau login ke dalam sistem. 

- Pengguna memilih otot yang ingin dipelajari dari daftar nama-nama otot. 

8 

- Pengguna melihat daftar gerakan yang tersedia untuk otot yang dipilih. 

- Pengguna mengklik salah satu gerakan untuk membuka halaman detail. 

- Pengguna menonton embedded video dari Youtube dan membaca deskripsi yang telah ditulis oleh Admin. 

- Pengguna dapat dengan bebas kembali ke daftar otot dan memilih otot lain kapan saja tanpa batasan. 

- Pengguna dapat melihat template jadwal Latihan sebagai panduan yang berisi daftar nama gerakan. 

- Pengguna dapat memberikan centang (checklist) pada hari-hari di jadwal sebagai catatan pribadi. 

- Pengguna dapat mengirimkan saran atau kritik melalui formulir dengan kategori yang tersedia.

- Pengguna dapat mendaftar (subscribe) ke template jadwal melalui tombol "Mulai Jadwal" di halaman detail template.

- Sistem mengirim email pengingat setiap pukul 07.00 WIB via Gmail SMTP untuk hari-hari jadwal yang belum dicentang.

- Sistem mengirim notifikasi email ke Admin setiap kali ada saran/kritik baru yang masuk.

- Pengguna yang login melihat hero section yang dipersonalisasi dengan sapaan nama, sedangkan tamu melihat CTA "Mulai Latihan". 

- Sistem mengirim notifikasi email ke Admin setiap kali ada saran/kritik baru yang masuk. 

- Admin login ke dashboard CMS untuk membaca, mengklasifikasi, dan membalas saran/kritik. 

- rapihkanTambahan : Jika saran bersifat teknis atau pertanyaan umum, Admin mempublikasikan jawabannya ke halaman FAQ secara anonim. 

- Jika saran berupa kritik video atau permintaan gerakan baru, Admin menindaklanjutinya dengan memperbarui konten di CMS. 

- Aturan bisnis: Jika terdapat 3 atau lebih permintaan gerakan yang sama dalam 1 minggu, sistem menampilkan notifikasi di dashboard Admin untuk segera menambahkan gerakan tersebut. 

- Sistem secara otomatis (Cron Job harian) memeriksa seluruh link Youtube yang tersimpan. Jika ditemukan link rusak, sistem mengirim notifikasi peringatan ke email Admin. 

- Admin melakukan perbaikan link Youtube yang rusak dengan menggantinya menggunakan CMS. 

## **11. Teknologi** 

- **Back-end:** Laravel 

- **Panel/Admin UI:** Filament 

- **Database:** MariaDB / MySQL 

- **Front-end:** Blade, HTML, CSS, JavaScript 

- **Web Server:** Nginx 

- **Containerization:** Docker 

- **Version Control:** Git dan GitHub 

- **Development Environment:** WSL dan Visual Studio Code 

## **12. Asumsi** 

- Pelanggan memiliki akses internet untuk mengakses website dan memutar video dari Youtube. 

9 

- Pelanggan dapat mengakses Youtube karena video di-embed langsung dari platform tersebut. 

- Admin memiliki pengetahuan dasar tentang kebugaran dan gerakan gym untuk menulis deskripsi yang akurat dan aman bagi pemula. 

- Proses belajar dan latihan dilakukan secara mandiri oleh pelanggan di luar sistem. 

- Admin bertindak sebagai pengelola utama konten dan moderator saran/kritik. 

- Website digunakan sebagai platform pendukung pembelajaran, bukan sebagai alat diagnosis medis atau terapi cedera. 

## **13. Risiko & Mitigasi** 

|**13. Risiko & Mitigasi**||
|---|---|
|||
|**Risiko**|**Mitigasi**|
|Video Youtube yang di-embed<br>dihapus atau diprivate oleh<br>pemiliknya|Jika terdapat Vidio yang diprivate atau dihapus maka<br>admin akan langsung mencari vidio alternatif serupa dari<br>Youtube.|
|Admin tidak aktif membalas<br>saran/kritik (melebihi SLA 12<br>jam)|Sistem mengirim notifikasi email setiap ada saran masuk.<br>Jika diperlukan, rekrut asisten admin paruh waktu.|
|Pengguna mengirimkan spam<br>atau pesan tidak pantas melalui<br>formulir saran|Pembatasan pengiriman per alamat IP untuk mencegah<br>penyalahgunaan.|
|Server mengalami gangguan di<br>luar jam kerja Admin|Dilakukan perawatan berkala serta penjadwalan ulang<br>pengerjaan apabila terjadi gangguan perangkat.|
|Pelanggan tidak mengambil<br>hasil cetakan sesuai jadwal|Menggunakan penyedia hosting dengan dukungan teknis<br>24/7 dan mengaktifkan notifikasi server down ke Admin<br>melalui SMS.|
|Konten deskripsi gerakan tidak<br>akurat dan berisiko<br>menyebabkan cedera|Deskripsi ditulis atau divalidasi oleh Admin yang<br>memiliki kompetensi fitness. Setiap gerakan dilengkapi<br>dengan daftar kesalahan umum untuk mengantisipasi<br>kesalahan teknispengguna.|
|Pengguna kehilangan akses ke<br>akun (lupa password)|Sistem menyediakan fitur "Lupa Password" dengan<br>pengiriman link reset melalui email terdaftar.|



## **14. Kriteria Penerimaan** 

- Pelanggan dapat melakukan registrasi dan login ke dalam sistem. 

- Pelanggan dapat melihat daftar nama-nama otot (Dada, Bahu, Punggung, Kaki, Lengan, Perut) pada halaman utama. 

- Pelanggan dapat memilih salah satu otot dan melihat daftar gerakan yang tersedia untuk otot tersebut. 

- Pelanggan dapat membuka halaman detail gerakan yang menampilkan embedded video dari Youtube serta deskripsi unik (step-by-step dan kesalahan umum) yang ditulis oleh Admin. 

10 

- Pelanggan dapat dengan bebas berpindah antar otot dan gerakan tanpa batasan atau syarat apapun (sifat opsional/non-linear). 

- Pelanggan dapat melihat template jadwal latihan mingguan (dapat berupa beberapa pilihan template, sesuai yang dikelola oleh Admin) beserta daftar gerakan di dalamnya (berupa teks biasa, tanpa tautan aktif). 

- Pelanggan dapat memberikan centang (checklist) pada hari-hari di jadwal sebagai catatan pribadi, dan checklist tersebut tersimpan per akun. 

- Pelanggan dapat melihat halaman FAQ publik yang berisi pertanyaan dan jawaban anonim. 

- Pelanggan dapat mengirimkan saran/kritik melalui formulir dengan pilihan kategori yang tersedia.

- Pelanggan dapat mendaftar (subscribe) template jadwal dan hari-hari muncul sebagai belum dicentang.

- Pelanggan menerima email pengingat setiap pukul 07.00 WIB untuk hari yang belum dicentang (via Gmail SMTP).

- Landing page menampilkan hero yang dipersonalisasi (sapaan untuk login, CTA untuk tamu) dan stats counter real-time.

- Komponen Livewire berfungsi: FAQ accordion + pencarian, form saran real-time, checklist AJAX, filter gerakan, navigasi gerakan.

- Admin dapat mengatur gambar background hero melalui CMS (Pengaturan Website).

- Admin dapat mencari dan mengunduh gambar workout dari Pexels API melalui Admin Panel.

- Data publik dapat diakses melalui REST API endpoint (JSON, tanpa autentikasi untuk GET). 

- Admin dapat login ke dashboard CMS. 

- Admin dapat mengelola data otot, gerakan, deskripsi, link Youtube, dan template jadwal (tambah, edit, hapus) melalui CMS. 

- Admin dapat melihat daftar saran/kritik yang masuk, mengubah statusnya, dan menulis balasan. 

- Admin dapat mempublikasikan jawaban atas pertanyaan teknis ke halaman FAQ secara anonim. 

- Sistem dapat melakukan pengecekan otomatis terhadap link Youtube setiap hari dan mengirim notifikasi ke Admin jika ditemukan link rusak. 

- Website dapat diakses 24 jam sehari tanpa tergantung pada jam kerja Admin. 

## **15. Diagram Use Case** 

11 

## **16. Riwayat Perubahan**

| Versi | Tanggal | Perubahan | Penulis |
|-------|---------|-----------|---------|
| 1.0 | 27 Jun 2026 | Dokumen awal — MVP: autentikasi, otot, gerakan, deskripsi, link Youtube, jadwal, centang, FAQ, saran/kritik, CMS admin | Tim |
| 1.2 | 13 Jul 2026 | Penambahan: REST API (7 endpoint), integrasi Pexels API, email reminder via Gmail SMTP, subscribe jadwal, komponen Livewire (MuscleGrid, ChecklistToggle, SaranForm, FaqAccordion, WorkoutNavigator), dark gym theme, personalized hero, stats counter, hero background, avatar dropdown, custom SW logo, FAQ & saran digabung satu halaman, content seeders | Tim |

