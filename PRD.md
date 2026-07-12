## **PRODUCT REQUIREMENT DOCUMENT (PRD)** 

**Produk:** Website Tutorial Workout GYM Untuk Pemula (SimpleWorkout) **Versi:** 1.0 (Final) **Tanggal:** 27 Juni 2026 **Status:** Siap Pengembangan **Dasar Acuan:** BRD Final (SimpleWorkout) v1.0 

## **1. PENDAHULUAN** 

## **1.1 Latar Belakang Produk** 

Proses belajar gerakan gym bagi pemula umumnya masih dilakukan secara acak melalui pencarian video tutorial di Youtube tanpa panduan yang terstruktur. Pemula sering kali tidak tahu gerakan apa yang harus dipelajari terlebih dahulu, bingung membedakan fungsi otot (dada, bahu, punggung, kaki), serta tidak memiliki akses ke deskripsi tertulis yang menjelaskan teknik gerakan secara aman dan benar. Hal ini menyebabkan risiko cedera, kebingungan, dan kebosanan karena program latihan yang kaku. 

Website Tutorial Workout GYM Untuk Pemula merupakan platform bimbingan kebugaran digital yang melayani kebutuhan pemula dalam mempelajari gerakan dasar gym seperti Squat, Bench Press, Deadlift, dan gerakan otot lainnya. Seiring dengan meningkatnya minat masyarakat terhadap kebugaran, kebutuhan akan panduan gerakan yang aman, mudah dipahami, dan fleksibel menjadi semakin penting. 

Untuk mengatasi permasalahan tersebut, diperlukan sebuah sistem berbasis web yang mampu menyajikan materi gerakan berdasarkan bagian otot secara terstruktur, menampilkan video tutorial dari Youtube yang telah dikurasi, menyertakan deskripsi unik (step-by-step dan kesalahan umum) yang ditulis oleh ahli, serta menyediakan panduan jadwal latihan mingguan yang tidak mengikat. Dengan adanya sistem ini, proses belajar gerakan gym dapat berjalan lebih mandiri, aman, dan menyenangkan bagi pemula. 

## **1.2 Definisi Produk** 

Website Tutorial Workout GYM Untuk Pemula (SimpleWorkout) adalah platform pembelajaran gerakan kebugaran berbasis web yang dirancang untuk membantu pemula dalam mempelajari teknik gerakan gym secara mandiri dan aman. 

Sistem ini memungkinkan pengguna untuk melihat daftar otot yang tersedia, memilih otot yang ingin dipelajari, melihat daftar gerakan untuk setiap otot, menonton video tutorial dari Youtube 

yang telah dikurasi, membaca deskripsi step-by-step dan kesalahan umum yang ditulis oleh Admin, serta melihat template jadwal latihan mingguan sebagai panduan. 

Selain itu, sistem menyediakan dashboard Admin (CMS) yang digunakan untuk mengelola data otot, gerakan, deskripsi, link Youtube, template jadwal, serta memoderasi seluruh saran dan kritik yang masuk dari pengguna dalam satu platform terpusat. Sistem juga menyediakan REST API untuk akses data publik, integrasi Pexels API untuk pencarian gambar workout, sistem pengingat email otomatis untuk konsistensi latihan, serta tampilan dark theme modern dengan komponen interaktif berbasis Livewire. 

## **1.3 Tujuan Dokumen** 

Product Requirement Document (PRD) ini disusun sebagai acuan dalam proses perancangan, pengembangan, pengujian, dan implementasi sistem Website Tutorial Workout GYM Untuk Pemula. Dokumen ini menjelaskan kebutuhan produk, fitur yang akan dikembangkan, perilaku sistem, kebutuhan pengguna, serta spesifikasi yang diperlukan sebagai pedoman dalam proses pengembangan aplikasi. 

## **1.4 Target Pengguna** 

## **Pelanggan** 

Pelanggan merupakan pengguna yang memanfaatkan sistem untuk melihat daftar otot dan gerakan, menonton video tutorial, membaca deskripsi gerakan, melihat template jadwal latihan, memberikan centang (checklist) pada jadwal sebagai catatan pribadi, mengirimkan saran/kritik, serta melihat halaman FAQ publik. 

## **Admin / Pemilik Usaha** 

Admin merupakan pengguna yang bertanggung jawab dalam mengelola data otot, gerakan, deskripsi, link Youtube, template jadwal, memoderasi seluruh saran/kritik dari pengguna, mempublikasikan jawaban ke FAQ, mengelola identitas visual website (logo, favicon, hero background), mencari dan mengunduh gambar workout dari Pexels API, serta memastikan seluruh link Youtube yang tersimpan masih aktif melalui pengecekan otomatis harian. 

## **2. TUJUAN PRODUK** 

## **2.1 Tujuan Pengguna** 

Sistem Website Tutorial Workout GYM Untuk Pemula dikembangkan untuk membantu pengguna dalam mempelajari gerakan gym secara lebih mudah, aman, dan fleksibel. Tujuan yang ingin dicapai dari sisi pengguna antara lain: 

- Memungkinkan pengguna melihat daftar nama-nama otot (Dada, Bahu, Punggung, Kaki, Lengan, Perut) pada halaman utama. 

- Memungkinkan pengguna memilih salah satu otot dan melihat daftar gerakan yang tersedia untuk otot tersebut. 

- Memungkinkan pengguna membuka halaman detail gerakan yang menampilkan embedded video dari Youtube serta deskripsi unik (step-by-step dan kesalahan umum) yang ditulis oleh Admin. 

- Memungkinkan pengguna berpindah antar otot dan gerakan secara bebas tanpa batasan 

atau syarat apapun (sifat non-linear/opsional). 

- Memungkinkan pengguna melihat template jadwal latihan mingguan sebagai panduan yang tidak mengikat. 

- Memungkinkan pengguna memberikan centang (checklist) pada hari-hari di jadwal sebagai catatan pribadi. 

- Memungkinkan pengguna melihat halaman FAQ & Kirim Saran yang menggabungkan FAQ publik dan formulir saran/kritik dalam satu halaman terpadu.

- Memungkinkan pengguna mendaftar (subscribe) ke template jadwal dan menerima pengingat email harian untuk hari yang belum selesai.

- Memungkinkan pengguna yang login melihat hero section yang dipersonalisasi dengan sapaan nama dan akses cepat ke jadwal mereka.

- Memungkinkan pengguna melihat statistik real-time (total gerakan, otot, jadwal) di landing page. 

## **2.2 Tujuan Admin / Pemilik Usaha** 

Sistem Website Tutorial Workout GYM Untuk Pemula dikembangkan untuk membantu pengelolaan konten dan operasional platform secara lebih efektif dan terpusat. Tujuan yang ingin dicapai dari sisi admin antara lain: 

- Mengelola data otot dan gerakan dalam satu sistem. 

- Mengelola deskripsi gerakan (step-by-step dan kesalahan umum). 

- Mengelola link Youtube untuk setiap gerakan. 

- Mengelola template jadwal latihan secara fleksibel (tambah, edit, hapus). 

- Memoderasi seluruh saran/kritik dari pengguna (membaca, mengklasifikasi, membalas).

- Mempublikasikan jawaban atas pertanyaan teknis ke halaman FAQ secara anonim.

- Mengelola gambar background hero dan aset visual website (logo, favicon, hero_background_url).

- Mencari dan mengunduh gambar workout dari Pexels API untuk mempercepat pengelolaan konten. 

- Mempublikasikan jawaban atas pertanyaan teknis ke halaman FAQ secara anonim. 

- Memastikan seluruh link Youtube yang tersimpan masih aktif melalui pengecekan otomatis harian. 

## **2.3 Indikator Keberhasilan Produk** 

Keberhasilan produk diukur berdasarkan kemampuan sistem dalam memenuhi kebutuhan pengguna dan mendukung proses pengelolaan konten. Indikator keberhasilan yang ditetapkan antara lain: 

- Pelanggan dapat melakukan registrasi dan login ke dalam sistem dengan data yang valid. 

- Pelanggan dapat melihat daftar otot dan gerakan yang tersedia pada sistem. 

- Pelanggan dapat membuka halaman detail gerakan yang menampilkan video Youtube dan deskripsi unik. 

- Pelanggan dapat berpindah antar otot dan gerakan secara bebas tanpa batasan (non-linear). 

- Pelanggan dapat melihat template jadwal latihan mingguan yang dikelola oleh Admin. 

- Pelanggan dapat memberikan centang (checklist) pada hari-hari di jadwal sebagai catatan pribadi. 

- Pelanggan dapat melihat halaman FAQ publik dan mengirimkan saran/kritik melalui formulir. 

- Admin dapat mengelola data otot, gerakan, deskripsi, link Youtube, dan template jadwal melalui CMS. 

- Admin dapat melihat daftar saran/kritik yang masuk, mengubah statusnya, dan menulis balasan. 

- Admin dapat mempublikasikan jawaban atas pertanyaan teknis ke halaman FAQ secara anonim. 

- Sistem dapat melakukan pengecekan otomatis terhadap link Youtube setiap hari dan mengirim notifikasi ke Admin jika ditemukan link rusak. 

- Website dapat diakses 24 jam sehari tanpa tergantung pada jam kerja Admin. 

- Seluruh fitur utama pada MVP dapat digunakan sesuai kebutuhan pengguna dan admin. 

## **3. PERSONA PENGGUNA** 

Bab ini menjelaskan karakteristik pengguna utama yang akan menggunakan sistem Website Tutorial Workout GYM Untuk Pemula. Persona pengguna digunakan sebagai acuan dalam proses perancangan fitur, antarmuka, serta pengalaman pengguna pada sistem. 

## **3.1 Persona Pelanggan** 

## **Profil Pengguna** 

|**Atribut**|**Deskripsi**|
|---|---|
|Nama Persona|Andi (Pemula Gym)|
|Usia|18 – 35 Tahun|
|Pekerjaan|Mahasiswa / Karyawan|
|Perangkat|Smartphone dan Laptop|
|Tingkat Penggunaan Teknologi|Menengah|
|Pengalaman Gym|0 – 6 bulan|



## **Kebutuhan** 

- Melihat daftar otot yang tersedia untuk dipelajari. 

- Memilih otot dan melihat daftar gerakan untuk otot tersebut. 

- Menonton video tutorial dari Youtube yang telah dikurasi. 

- Membaca deskripsi step-by-step dan kesalahan umum yang ditulis oleh Admin. 

- Melihat template jadwal latihan mingguan sebagai panduan. 

- Memberikan centang (checklist) pada hari-hari di jadwal sebagai catatan pribadi. 

- Mengirimkan saran/kritik jika ada konten yang perlu diperbaiki. 

## **Permasalahan yang Dihadapi** 

- Tidak tahu harus mencari gerakan apa terlebih dahulu karena kebingungan membedakan fungsi otot. 

- Video Youtube yang tersedia sangat banyak dan tidak semuanya aman untuk pemula. 

- Tidak ada deskripsi tertulis yang menyertai video secara spesifik. 

- Program latihan yang beredar di internet terlalu kaku (wajib mengikuti urutan A ke B). 

## **Tujuan Penggunaan Sistem** 

- Mempermudah proses belajar gerakan gym. 

- Mengurangi risiko cedera karena gerakan disertai deskripsi kesalahan umum. 

- Mendapatkan kebebasan belajar tanpa tekanan mengikuti urutan yang kaku. 

## **3.2 Persona Admin / Pemilik Usaha** 

## **Profil Pengguna** 

|**Atribut**|**Deskripsi**|
|---|---|
|Nama Persona|Budi (Pengelola Konten)|
|Usia|18 – 30 Tahun|
|Pekerjaan|Pengelola Website Tutorial Workout GYM|
|Perangkat|Laptop dan Smartphone|
|Tingkat Penggunaan Teknologi|Menengah hingga Tinggi|
|Kompetensi|Pengetahuan dasar kebugaran dan gerakan<br>gym|



## **Kebutuhan** 

- Mengelola data otot dan gerakan. 

- Mengelola deskripsi gerakan (step-by-step dan kesalahan umum). 

- Mengelola link Youtube untuk setiap gerakan. 

- Mengelola template jadwal latihan secara fleksibel. 

- Memoderasi seluruh saran/kritik dari pengguna. 

- Mempublikasikan jawaban ke halaman FAQ secara anonim. 

- Memastikan seluruh link Youtube yang tersimpan masih aktif. 

## **Permasalahan yang Dihadapi** 

- Kesulitan mengetahui konten mana yang perlu diperbaiki karena tidak ada sistem penampung saran yang terstruktur. 

- Link Youtube yang digunakan bisa dihapus atau diprivate oleh pemiliknya tanpa pemberitahuan. 

- Proses update konten masih manual dan tidak terpusat. 

## **Tujuan Penggunaan Sistem** 

- Memusatkan seluruh data konten dalam satu sistem. 

- Mempermudah pengelolaan otot, gerakan, dan deskripsi. 

- Menampung dan merespons saran/kritik dari pengguna secara terstruktur. 

- Mengetahui link Youtube yang rusak melalui pengecekan otomatis harian. 

## **4. USER STORY** 

|**ID**|**Aktor**|**User Story**|**Manfaat**|
|---|---|---|---|
|US-01|Pelanggan|Sebagai pelanggan,<br>saya ingin membuat<br>akun agar dapat<br>mengakses seluruh<br>fitur sistem.|Memudahkan akses<br>ke seluruh fitur<br>sistem.|
|US-02|Pelanggan|Sebagai pelanggan,|Menjaga keamanan|



||**ID**<br>**Aktor**<br>**User Story**<br>**Manfaat**<br>saya ingin login ke<br>sistem agar dapat<br>mengakses data<br>checklist jadwal dan<br>saran saya.<br>dan akses data<br>pengguna.<br>US-03<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin melihat<br>daftar otot yang<br>tersedia agar dapat<br>memilih otot yang<br>ingin saya latih.<br>Memudahkan proses<br>pemilihan materi<br>belajar.<br>US-04<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin memilih<br>otot dan melihat daftar<br>gerakan agar<br>mengetahui gerakan<br>apa saja yang<br>tersedia untuk otot<br>tersebut.<br>Memudahkan<br>eksplorasi gerakan<br>per otot.<br>US-05<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin membuka<br>halaman detail<br>gerakan agar dapat<br>menonton video dan<br>membaca deskripsi<br>gerakan.<br>Mendukung proses<br>belajar gerakan<br>secara mandiri.<br>US-06<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin berpindah<br>antar otot dan<br>gerakan secara bebas<br>agar tidak merasa<br>terpaksa mengikuti<br>urutan yang kaku.<br>Memberikan<br>kebebasan belajar<br>(non-linear/opsional).<br>US-07<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin melihat<br>template jadwal<br>latihan mingguan agar<br>mendapatkan<br>gambaran jadwal jika<br>saya bingung<br>menyusunnya sendiri.<br>Memberikan panduan<br>latihan yang tidak<br>mengikat.|
|---|---|



||**ID**<br>**Aktor**<br>**User Story**<br>**Manfaat**<br>US-08<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin<br>memberikan centang<br>(checklist) pada<br>hari-hari di jadwal<br>sebagai catatan<br>pribadi agar dapat<br>melacak konsistensi<br>saya.<br>Membantu monitoring<br>latihan pribadi.<br>US-09<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin melihat<br>halaman FAQ publik<br>agar dapat<br>menemukan jawaban<br>atas pertanyaan<br>umum.<br>Memberikan solusi<br>cepat tanpa harus<br>bertanya langsung.<br>US-10<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin<br>mengirimkan<br>saran/kritik melalui<br>formulir agar dapat<br>memberikan masukan<br>untuk perbaikan<br>konten.<br>Menyediakan saluran<br>komunikasi dengan<br>Admin.<br>US-11<br>Pelanggan<br>Sebagai pelanggan,<br>saya ingin melihat<br>informasi kontak<br>Admin agar dapat<br>menghubungi jika<br>diperlukan.<br>Mempermudah<br>komunikasi dengan<br>Admin.<br>US-12<br>Admin<br>Sebagai admin, saya<br>ingin mengelola data<br>otot agar data otot<br>selalu sesuai dengan<br>kebutuhan konten.<br>Menjaga data otot<br>tetap akurat.<br>US-13<br>Admin<br>Sebagai admin, saya<br>ingin mengelola data<br>gerakan agar<br>informasi gerakan<br>selalu sesuai dengan<br>kebutuhan pengguna.<br>Menjaga data gerakan<br>tetap akurat.|
|---|---|



||**ID**<br>**Aktor**<br>**User Story**<br>**Manfaat**<br>US-14<br>Admin<br>Sebagai admin, saya<br>ingin mengelola<br>deskripsi gerakan<br>(step-by-step dan<br>kesalahan umum)<br>agar pengguna<br>mendapatkan<br>panduan yang aman<br>dan jelas.<br>Memastikan kualitas<br>konten pembelajaran.<br>US-15<br>Admin<br>Sebagai admin, saya<br>ingin mengelola link<br>Youtube untuk setiap<br>gerakan agar video<br>yang ditampilkan<br>selalu relevan dan<br>dapat diakses.<br>Menjaga ketersediaan<br>video tutorial.<br>US-16<br>Admin<br>Sebagai admin, saya<br>ingin mengelola<br>template jadwal<br>latihan secara<br>fleksibel (tambah,<br>edit, hapus) agar<br>panduan jadwal selalu<br>sesuai kebutuhan.<br>Menjaga fleksibilitas<br>panduan latihan.<br>US-17<br>Admin<br>Sebagai admin, saya<br>ingin melihat daftar<br>saran/kritik yang<br>masuk agar dapat<br>mengetahu masukan<br>dari pengguna.<br>Mendukung perbaikan<br>konten secara<br>berkelanjutan.<br>US-18<br>Admin<br>Sebagai admin, saya<br>ingin mengubah<br>status saran/kritik dan<br>menulis balasan agar<br>pengguna mengetahui<br>bahwa masukan<br>mereka telah<br>diproses.<br>Memberikan respons<br>yang terstruktur<br>kepada pengguna.<br>US-19<br>Admin<br>Sebagai admin, saya<br>ingin<br>mempublikasikan<br>Memperkaya halaman<br>FAQ secara organik.|
|---|---|



|**ID**|**Aktor**|**User Story**|**Manfaat**|
|---|---|---|---|
|||jawaban atas<br>pertanyaan teknis ke<br>halaman FAQ secara<br>anonim agar<br>pengguna lain dapat<br>membaca<br>jawabannya.||
|US-20|Admin|Sebagai admin, saya<br>ingin menerima<br>notifikasi jika ada link<br>Youtube yang rusak<br>agar dapat segera<br>memperbaikinya.|Menjaga ketersediaan<br>konten video.|

**User Stories — Versi 1.2 (Penambahan):**

|**ID**|**Aktor**|**User Story**|**Manfaat**|
|---|---|---|---|
|US-21|Pelanggan|Sebagai pelanggan, saya ingin mendaftar ke template jadwal latihan tertentu agar menerima pengingat email setiap pagi untuk hari yang belum selesai.|Membantu konsistensi latihan.|
|US-22|Pelanggan|Sebagai pelanggan, saya ingin melihat statistik platform (total gerakan, otot, jadwal) di landing page agar memahami skala konten.|Memberikan gambaran konten tersedia.|
|US-23|Pelanggan|Sebagai pelanggan yang sudah login, saya ingin disambut secara personal di hero section landing page agar merasa dihargai.|Meningkatkan retensi pengguna.|
|US-24|Pelanggan|Sebagai pelanggan, saya ingin FAQ dan formulir saran berada dalam satu halaman yang sama dengan pencarian accordion agar mudah menemukan jawaban.|Mempercepat akses informasi.|
|US-25|Admin|Sebagai admin, saya ingin mengelola gambar background hero landing page melalui CMS agar tampilan website selalu segar.|Menjaga daya tarik visual.|
|US-26|Admin|Sebagai admin, saya ingin mencari gambar workout dari Pexels API melalui Admin Panel agar tidak perlu upload manual.|Menghemat waktu pengelolaan konten.|
|US-27|Developer|Sebagai developer, saya ingin mengakses data workout melalui REST API agar dapat mengintegrasikan dengan aplikasi lain.|Memperluas jangkauan platform.|



## **5. PRODUCT BACKLOG** 

## **5.1 Daftar Product Backlog** 

|**ID**|**Fitur**|**Deskripsi**|**Prioritas**|**Iterasi**|
|---|---|---|---|---|
|PB-01|Registrasi Akun|Pelanggan dapat<br>membuat akun<br>baru pada sistem|High|Iterasi 1|
|PB-02|Login dan Logout|Pengguna dapat<br>masuk dan<br>keluar dari sistem|High|Iterasi 1|
|PB-03|Daftar Otot|Menampilkan<br>daftar<br>nama-nama otot<br>(Dada, Bahu,<br>Punggung, Kaki,<br>Lengan, Perut)|High|Iterasi 1|
|PB-04|Daftar Gerakan<br>per Otot|Menampilkan<br>daftar gerakan<br>yang tersedia<br>untuk setiap otot|High|Iterasi 1|
|PB-05|Detail Gerakan|Menampilkan<br>halaman detail<br>gerakan (video +<br>deskripsi)|High|Iterasi 2|



||**ID**<br>**Fitur**<br>**Deskripsi**<br>**Prioritas**<br>**Iterasi**<br>PB-06<br>Navigasi<br>Non-Linear<br>Pengguna dapat<br>berpindah antar<br>otot/gerakan<br>secara bebas<br>tanpa batasan<br>High<br>Iterasi 2<br>PB-07<br>Template Jadwal<br>Menampilkan<br>template jadwal<br>latihan mingguan<br>(fleksibel)<br>High<br>Iterasi 2<br>PB-08<br>Checklist Jadwal<br>Pelanggan dapat<br>memberikan<br>centang<br>(checklist) pada<br>hari-hari di jadwal<br>Medium<br>Iterasi 2<br>PB-09<br>Halaman FAQ<br>Menampilkan<br>halaman FAQ<br>publik dengan<br>pertanyaan dan<br>jawaban anonim<br>Medium<br>Iterasi 3<br>PB-10<br>Formulir<br>Saran/Kritik<br>Pelanggan dapat<br>mengirimkan<br>saran/kritik<br>melalui formulir<br>High<br>Iterasi 3<br>PB-11<br>Kelola Otot<br>Admin dapat<br>mengelola data<br>otot (tambah,<br>edit, hapus)<br>High<br>Iterasi 4<br>PB-12<br>Kelola Gerakan<br>Admin dapat<br>mengelola data<br>gerakan (tambah,<br>edit, hapus, relasi<br>otot)<br>High<br>Iterasi 4<br>PB-13<br>Kelola Deskripsi<br>Admin dapat<br>mengelola<br>deskripsi gerakan<br>(step-by-step dan<br>kesalahan<br>umum)<br>High<br>Iterasi 4<br>PB-14<br>Kelola Link<br>Admin dapat<br>High<br>Iterasi 4|
|---|---|



|**ID**|**Fitur**|**Deskripsi**|**Prioritas**|**Iterasi**|
|---|---|---|---|---|
||Youtube|mengelola link<br>Youtube untuk<br>setiap gerakan|||
|PB-15|Kelola Template<br>Jadwal|Admin dapat<br>mengelola<br>template jadwal<br>secara fleksibel<br>(tambah, edit,<br>hapus)|Medium|Iterasi 4|
|PB-16|Moderasi<br>Saran/Kritik|Admin dapat<br>melihat,<br>mengubah<br>status, dan<br>membalas<br>saran/kritik|High|Iterasi 5|
|PB-17|Publikasi FAQ|Admin dapat<br>mempublikasikan<br>jawaban ke<br>halaman FAQ<br>secara anonim|Medium|Iterasi 5|
|PB-18|Pengecekan Link<br>Otomatis|Sistem<br>melakukan<br>pengecekan link<br>Youtube setiap<br>hari dan notifikasi<br>jika rusak|High|Iterasi 5|
|PB-19|Kelola Informasi<br>Website|Admin dapat<br>mengelola<br>informasi kontak<br>dan jam<br>operasional<br>website|Medium|Iterasi 5|

**Product Backlog — Versi 1.2 (Penambahan):**

|**ID**|**Fitur**|**Deskripsi**|**Prioritas**|**Iterasi**|
|---|---|---|---|---|
|PB-20|Subscribe Jadwal|Pelanggan dapat mendaftar ke template jadwal untuk menerima pengingat email otomatis|Medium|Iterasi 5|
|PB-21|Email Reminder|Sistem mengirim email pengingat latihan via Gmail SMTP setiap pukul 07.00 WIB|Medium|Iterasi 5|
|PB-22|REST API|Endpoint REST API publik untuk data otot, gerakan, jadwal, dan FAQ|Medium|Iterasi 5|
|PB-23|Pexels API|Admin mencari dan mengunduh gambar workout dari Pexels API melalui Admin Panel|Medium|Iterasi 5|
|PB-24|Livewire Components|Komponen interaktif: MuscleGrid, ChecklistToggle, SaranForm, FaqAccordion, WorkoutNavigator|Medium|Iterasi 5|
|PB-25|Dark Gym Theme|Tampilan dark theme gym dengan aksen oranye di seluruh halaman publik|High|Iterasi 3|
|PB-26|Personalized Hero|Hero section landing page menampilkan sapaan personal untuk pengguna login|Medium|Iterasi 5|
|PB-27|Stats Counter|Menampilkan statistik real-time di landing page (total gerakan, otot, template jadwal)|Medium|Iterasi 5|
|PB-28|Hero Background|Admin mengelola gambar background hero melalui CMS|Low|Iterasi 5|
|PB-29|Avatar Dropdown|Dropdown navbar dengan avatar inisial pengguna, profil, dan logout|Medium|Iterasi 5|



## **5.2 Perencanaan Iterasi Pengembangan** 

## **Iterasi 1 – Autentikasi dan Daftar Otot** 

Fokus pada pembangunan fitur dasar yang diperlukan agar pengguna dapat mengakses sistem dan melihat daftar otot yang tersedia. 

Fitur yang dikembangkan: 

- Registrasi akun pelanggan. 

- Login dan logout pengguna. 

● Daftar nama-nama otot (Dada, Bahu, Punggung, Kaki, Lengan, Perut). **Iterasi 2 – Eksplorasi Gerakan dan Jadwal** 

Fokus pada proses eksplorasi gerakan dan panduan jadwal latihan. 

Fitur yang dikembangkan: 

- Daftar gerakan per otot. 

- Halaman detail gerakan (video + deskripsi). 

- Navigasi non-linear (bebas berpindah). 

- Template jadwal latihan (fleksibel). 

- Checklist jadwal (opsional). 

## **Iterasi 3 – Feedback dan FAQ** 

Fokus pada penampungan saran/kritik dan pengelolaan FAQ. 

Fitur yang dikembangkan: 

- Halaman FAQ publik. 

- Formulir saran/kritik dengan pilihan kategori. 

- Konfirmasi pengiriman saran/kritik. 

## **Iterasi 4 – Manajemen Konten Admin (CMS)** 

Fokus pada pengelolaan konten oleh Admin. 

Fitur yang dikembangkan: 

- Manajemen data otot. 

- Manajemen data gerakan. 

- Manajemen deskripsi gerakan. 

- Manajemen link Youtube. 

- Manajemen template jadwal (fleksibel). 

## **Iterasi 5 – Moderasi, Pemeliharaan, dan Polishing** 

Fokus pada moderasi saran/kritik, pemeliharaan sistem, dan fitur lanjutan.

Fitur yang dikembangkan:

- Melihat daftar saran/kritik yang masuk.

- Mengubah status saran/kritik (Pending, On-Progress, Resolved).

- Menulis balasan untuk setiap saran/kritik.

- Mempublikasikan jawaban ke FAQ secara anonim.

- Pengecekan otomatis link Youtube (Cron Job harian).

- Notifikasi link rusak ke Admin.

- Kelola informasi website (termasuk hero_background_url, logo, favicon).

- Subscribe jadwal dan email reminder via Gmail SMTP.

- REST API endpoint publik (7 endpoint).

- Integrasi Pexels API untuk gambar workout.

- Komponen Livewire (MuscleGrid, ChecklistToggle, SaranForm, FaqAccordion, WorkoutNavigator).

- Personalized hero landing page + stats counter.

- Avatar dropdown navigasi.

- Dark theme gym di seluruh halaman publik. 

## **5.3 Minimum Viable Product (MVP)** 

Minimum Viable Product (MVP) merupakan kumpulan fitur minimum yang harus tersedia agar sistem dapat digunakan sesuai kebutuhan utama bisnis. Fitur yang termasuk dalam MVP antara lain: 

- Registrasi akun, Login dan logout. 

- Daftar otot, Daftar gerakan per otot, Halaman detail gerakan (video + deskripsi). 

- Navigasi non-linear, Template jadwal latihan, Checklist jadwal (opsional). 

- Halaman FAQ publik, Formulir saran/kritik (FAQ & Kirim Saran — satu halaman terpadu dengan Livewire).

- Dashboard Admin (CMS) untuk mengelola konten, Moderasi saran/kritik, Pexels API integration.

- Dark theme gym dengan komponen Livewire untuk interaktivitas.

## **6. SITEMAP** 

## **6.1 Halaman Publik** 

Halaman publik dapat diakses oleh seluruh pengunjung website tanpa harus login terlebih dahulu. 

Dashboard Pelanggan<br>├── Beranda / Landing Page (dark theme, personalized hero, stats counter)<br>├── Profil<br>├── Daftar Otot → Detail Otot (MuscleGrid Livewire filter)<br>├── Detail Gerakan (Video + Deskripsi + WorkoutNavigator Livewire)<br>├── Jadwal Latihan (checklist via ChecklistToggle Livewire, subscribe)<br>├── FAQ & Kirim Saran (FaqAccordion + SaranForm Livewire, satu halaman)<br>└── Logout 

## **6.3 Dashboard Admin** 

Dashboard Admin ├── Dashboard ├── Data Pelanggan ├── Otot ├── Gerakan ├── Deskripsi Gerakan ├── Link Youtube ├── Template Jadwal ├── Saran/Kritik ├── FAQ ├── Informasi Website └── Pengaturan 

## **6.4 Alur Saran dan Kritik** 

[Pelanggan mengisi formulir] -> [Pending] -> [Notifikasi Email ke Admin] -> [On-Progress] -> [Teknis / Kritik Video / Saran Gerakan Baru] -> [Resolved] 

## **7. SPESIFIKASI FITUR** 

## **7.1 Registrasi Akun** 

**Input:** Nama Lengkap, Email, Nomor WhatsApp (opsional), Password, Konfirmasi Password. **Aturan Bisnis:** Email unik, password minimal 8 karakter, konfirmasi password harus sesuai. 

## **7.2 Login dan Lupa Password** 

**Aturan Bisnis:** Email dan password sesuai data, link reset password berlaku 60 menit. 

## **7.3 Manajemen Otot & 7.4 Manajemen Gerakan** 

**Aturan Bisnis:** Slug dibuat otomatis, status aktif menampilkan di pelanggan, status tidak aktif menyembunyikan konten. 

## **7.5 Manajemen Deskripsi Gerakan & 7.6 Manajemen Link Youtube** 

**Aturan Bisnis:** Relasi satu-ke-satu untuk deskripsi gerakan, format tautan YouTube harus valid. 

## **7.7 Manajemen Template Jadwal & 7.8 Checklist Jadwal Pribadi** 

**Aturan Bisnis:** Checklist disimpan per akun pelanggan dan bersifat opsional. 

## **7.11 Saran dan Kritik & 7.12 FAQ Publik** 

**Aturan Bisnis:** Rate limiting per IP diterapkan untuk mencegah spam, FAQ diurutkan dari yang terbaru. 

## **7.13 Moderasi Saran/Kritik & 7.14 Pengecekan Link Youtube Otomatis** 

**Aturan Bisnis:** Jika ada 3 atau lebih permintaan gerakan sama dalam seminggu, muncul notifikasi khusus di dashboard. Cron Job pengecekan otomatis link berjalan setiap pukul 02.00 pagi. Cron Job pengingat email latihan berjalan setiap pukul 07.00 pagi.

### 7.15 Subscribe Jadwal (Mulai Jadwal)

**Aturan Fungsional:**
- Pelanggan yang sudah login dapat mengklik tombol "Mulai Jadwal" di halaman detail template jadwal.
- Sistem membuat record JadwalPengguna untuk semua hari dalam template dengan status is_checked = false.
- Pelanggan kemudian dapat mencentang setiap hari seiring menyelesaikan latihan.

### 7.16 Email Reminder (Pengingat Latihan)

**Aturan Fungsional:**
- Cron job berjalan setiap pukul 07.00 WIB. Sistem memeriksa semua pelanggan yang memiliki jadwal_pengguna dengan is_checked = false untuk urutan_hari yang sesuai hari ini.
- Setiap pelanggan yang memenuhi kriteria menerima email pengingat berisi: nama hari, daftar gerakan, link "Buka Jadwal Saya", dan link kontak Admin.
- Pengiriman menggunakan Gmail SMTP (smtp.gmail.com:587 TLS).
- Console command: `workout:send-reminders`, Mailable class: `WorkoutReminderMail`.

### 7.17 REST API

**Aturan Fungsional:**
- 7 endpoint REST API publik: GET /api/muscles, GET /api/muscles/{slug}, GET /api/workouts/{slug}, GET /api/schedules, GET /api/schedules/{slug}, GET /api/faq, POST /api/saran.
- Semua GET endpoint bersifat public read-only, tanpa autentikasi.
- POST /api/saran memiliki rate limiting 3x/jam/IP.
- Response format: `{"success": bool, "data": mixed, "message": string}`.

### 7.18 Integrasi Pexels API

**Aturan Fungsional:**
- Tombol "Cari Gambar dari Pexels" tersedia di form Create/Edit WorkoutResource di Admin Panel.
- Admin memasukkan kata kunci pencarian (default: judul workout). Sistem mengambil 9 hasil gambar dari Pexels API, mengunduh gambar pertama secara otomatis.
- Gambar disimpan ke folder workouts/ dengan nama pexels-{id}.jpg.
- Atribusi fotografer wajib dicantumkan (syarat Pexels API).
- Service: app/Services/PexelsService.php, Config: config/pexels.php.

### 7.19 Dark Gym Theme (Tema Visual)

**Aturan Fungsional:**
- Seluruh halaman publik menggunakan palet warna dark: bg-slate-950 (body), bg-slate-900/800 (cards/nav/footer), text-slate-200/300/400.
- Aksen oranye (#F97365) untuk tombol CTA, link aktif, dan elemen interaktif.
- Filament admin panel menggunakan Hasnayeen Themes plugin dengan default 'sunset'.

### 7.20 Livewire Components (Komponen Interaktif)

**Aturan Fungsional:**
- MuscleGrid: Filter gerakan berdasarkan tipe (Gym/Home), hasil langsung ter-refresh tanpa reload.
- ChecklistToggle: Tombol centang jadwal via AJAX (Livewire), toggle visual instan.
- SaranForm: Formulir dengan validasi real-time, pesan error inline, dan konfirmasi berhasil tanpa redirect.
- FaqAccordion: Kotak pencarian FAQ yang memfilter accordion secara langsung.
- WorkoutNavigator: Tombol "Sebelumnya" / "Selanjutnya" di halaman detail gerakan.

### 7.21 Personalized Hero & Stats Counter

**Aturan Fungsional:**
- Hero section menggunakan @auth/@guest: login → sapaan personal "Halo, [Nama]!", tamu → tagline + CTA.
- Hero background: jika hero_background_url diisi, tampilkan gambar dengan overlay; jika tidak, fallback solid.
- Stats counter: 3 angka real-time dari database (totalWorkouts, totalMuscles, totalSchedules).

### 7.22 Avatar Dropdown & Custom Logo

**Aturan Fungsional:**
- Navbar menampilkan avatar dengan inisial nama pengguna (huruf pertama, lingkaran oranye).
- Dropdown (Alpine.js) berisi nama, email, link profil, dan tombol logout.
- Logo SVG kustom: weight plates + barbell + inisial "SW".

## **8. WIREFRAME DAN MOCKUP** 

Bagian ini mencakup daftar halaman yang akan dibuat rancangan antarmukanya, termasuk Beranda, Daftar Otot, Detail Otot, Detail Gerakan, Jadwal Latihan, FAQ, Login, Registrasi, dan Dashboard Admin. 

## **9. MVP DAN ROADMAP PENGEMBANGAN** 

## **9.1 Rencana Pengembangan Versi** 

- **Versi 1.0 (MVP):** Digitalisasi fitur inti belajar gerakan gym dan CMS dasar. 

- **Versi 1.1:** Publikasi FAQ anonim, otomatisasi pengecekan link YouTube, dan optimasi 

notifikasi khusus. 

- **Versi 1.2:** REST API endpoint, personalisasi hero landing page, stats counter, avatar dropdown, integrasi Pexels API, subscribe jadwal & email reminder via Gmail SMTP, komponen Livewire (MuscleGrid, ChecklistToggle, SaranForm, FaqAccordion, WorkoutNavigator), dark theme gym. 

## **9.4 Teknologi yang Digunakan** 

|**Komponen**|**Teknologi**|
|---|---|---|
|Backend|Laravel|
|Frontend|Blade Template, HTML, Tailwind CSS, Alpine.js, Livewire v3|
|Database|MariaDB / MySQL|
|Admin Panel|Filament v3 + Hasnayeen Themes Plugin|
|Email|Gmail SMTP|
|External API|Pexels API (gambar workout)|
|Web Server|Nginx|
|Containerization|Docker|



## **10. ACCEPTANCE CRITERIA** 

Kriteria penerimaan mencakup kesesuaian fungsionalitas registrasi, login, navigasi non-linear, monitoring checklist jadwal pribadi, pengiriman umpan balik bebas spam, pengelolaan CMS, serta ketersediaan sistem penuh selama 24/7 tanpa bergantung aktivitas manual admin.

**Kriteria Tambahan (Versi 1.2):**
- Landing page menampilkan hero section yang berbeda untuk pengguna login ("Halo, [Nama]!") dan pengguna tamu ("Mulai Latihan").
- Landing page menampilkan stats counter dengan jumlah gerakan, bagian otot, dan template jadwal yang dihitung secara real-time.
- Admin dapat mengatur hero_background_url dan gambar akan tampil di landing page dengan overlay gradient.
- FAQ dan formulir saran/kritik dapat diakses dalam satu halaman terpadu dengan accordion interaktif dan validasi real-time (Livewire).
- Checklist jadwal berfungsi via AJAX tanpa reload halaman (Livewire ChecklistToggle).
- Navigasi gerakan sebelumnya/selanjutnya berfungsi tanpa reload halaman (Livewire WorkoutNavigator).
- Filter gerakan berdasarkan tipe (Gym/Home) berfungsi tanpa reload (Livewire MuscleGrid).
- Pelanggan dapat mendaftar (subscribe) template jadwal dan menerima pengingat email setiap pagi via Gmail SMTP.
- Navbar menampilkan avatar dengan inisial pengguna saat login, dan dropdown menu dengan profil dan logout.
- Logo SVG kustom "SW" tampil di navbar dan halaman guest.
- Seluruh halaman publik menggunakan dark theme gym yang konsisten (slate + oranye).
- REST API endpoint publik mengembalikan data JSON yang valid.
- Admin dapat mencari dan mengunduh gambar workout dari Pexels API melalui Admin Panel. 

