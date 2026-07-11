@extends('public.layout')

@section('title', 'Beranda')

@section('content')
    <section class="relative py-24 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 via-transparent to-orange-500/5 opacity-50"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-orange-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <span class="inline-block bg-orange-500/20 text-orange-400 text-sm font-semibold px-4 py-1.5 rounded-full mb-4 uppercase tracking-wider">#TrainWithPurpose</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 animate-fade-in-up leading-tight">
                {{ $pengaturan->hero_title ?? 'BANGUN TUBUH IDEALMU' }}
            </h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto animate-fade-in mb-8" style="animation-delay: 0.2s">
                {{ $pengaturan->hero_subtitle ?? 'Platform belajar gerakan gym untuk pemula. Pilih otot yang ingin difokuskan dan pelajari teknik yang benar.' }}
            </p>
            <div class="flex flex-wrap justify-center gap-4 animate-fade-in" style="animation-delay: 0.4s">
                <a href="#peta-tubuh" class="inline-flex items-center gap-2 bg-orange-500 text-white font-bold px-8 py-4 rounded-xl hover:bg-orange-600 transition-colors shadow-xl shadow-orange-500/30 text-lg">
                    Mulai Latihan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('schedules.index') }}" class="inline-flex items-center gap-2 border border-slate-600 text-slate-300 font-semibold px-8 py-4 rounded-xl hover:border-orange-500 hover:text-orange-400 transition-colors text-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Lihat Jadwal
                </a>
            </div>
        </div>
    </section>

    <section id="peta-tubuh" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-white mb-3">Peta Tubuh</h2>
            <p class="text-slate-400">Pilih bagian otot yang ingin kamu fokuskan</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-3xl mx-auto">
            @foreach ($muscleGroups as $muscle)
                <a href="{{ route('muscle.show', $muscle->slug) }}"
                   class="group bg-slate-800 rounded-2xl border border-slate-700 hover:border-orange-500/50 transition-all duration-300 p-6 text-center hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/5">
                    <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-slate-700 flex items-center justify-center group-hover:bg-orange-500/20 transition-colors group-hover:animate-float">
                        @include('public.partials.muscle-icon', ['slug' => $muscle->slug])
                    </div>
                    <h3 class="font-bold text-white group-hover:text-orange-400 transition-colors">
                        {{ $muscle->name }}
                    </h3>
                    @if($muscle->description)
                        <p class="text-xs text-slate-500 mt-1 group-hover:text-slate-400">{{ \Illuminate\Support\Str::limit($muscle->description, 50) }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </section>

    <section class="border-t border-slate-800 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-white mb-3">Mengapa SimpleWorkout?</h2>
                <p class="text-slate-400">Platform workout yang dirancang untuk pemula</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <div class="text-center p-8 rounded-2xl bg-slate-800 border border-slate-700 hover:border-orange-500/30 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-orange-500/10 flex items-center justify-center">
                        <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-bold text-white mb-2">Video Terkurasi</h3>
                    <p class="text-sm text-slate-400">Video YouTube yang telah dipilih khusus untuk pemula — aman dan mudah diikuti.</p>
                </div>
                <div class="text-center p-8 rounded-2xl bg-slate-800 border border-slate-700 hover:border-orange-500/30 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-orange-500/10 flex items-center justify-center">
                        <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="font-bold text-white mb-2">Deskripsi Lengkap</h3>
                    <p class="text-sm text-slate-400">Step-by-step detail + daftar kesalahan umum agar Anda terhindar dari cedera.</p>
                </div>
                <div class="text-center p-8 rounded-2xl bg-slate-800 border border-slate-700 hover:border-orange-500/30 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-orange-500/10 flex items-center justify-center">
                        <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-bold text-white mb-2">Belajar Fleksibel</h3>
                    <p class="text-sm text-slate-400">Pilih bebas bagian otot yang ingin dipelajari — tanpa urutan kaku yang membosankan.</p>
                </div>
            </div>
        </div>
    </section>

    @if($pengaturan)
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center border-t border-slate-800">
            <h2 class="text-2xl font-extrabold text-white mb-6">Kontak Admin</h2>
            <div class="inline-flex flex-col sm:flex-row gap-6 text-slate-400 text-sm">
                @if($pengaturan->email_admin)
                    <a href="mailto:{{ $pengaturan->email_admin }}" class="flex items-center gap-2 hover:text-orange-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        {{ $pengaturan->email_admin }}
                    </a>
                @endif
                @if($pengaturan->nomor_whatsapp_admin)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->nomor_whatsapp_admin) }}" target="_blank" class="flex items-center gap-2 hover:text-orange-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        {{ $pengaturan->nomor_whatsapp_admin }}
                    </a>
                @endif
                @if($pengaturan->jam_operasional)
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $pengaturan->jam_operasional }}
                    </span>
                @endif
            </div>
        </section>
    @endif
@endsection
