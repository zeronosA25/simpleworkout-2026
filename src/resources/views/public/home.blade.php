@extends('public.layout')

@section('title', 'Beranda')

@section('content')
    <section class="bg-gradient-to-br from-cyan-500 via-blue-500 to-blue-700 text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-cyan-300 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in-up">{{ $pengaturan->hero_title ?? 'Selamat Datang di SimpleWorkout' }}</h1>
            <p class="text-lg text-cyan-100 max-w-2xl mx-auto animate-fade-in" style="animation-delay: 0.2s">
                {{ $pengaturan->hero_subtitle ?? 'Platform belajar gerakan gym untuk pemula. Pilih otot yang ingin difokuskan dan pelajari teknik yang benar.' }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Peta Tubuh — Pilih Bagian Otot</h2>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
            @foreach ($muscleGroups as $muscle)
                <a href="{{ route('muscle.show', $muscle->slug) }}"
                   class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-cyan-100 hover:border-cyan-400 transition-all duration-300 p-6 text-center hover:-translate-y-1">
                    <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-gradient-to-br from-cyan-100 to-blue-100 flex items-center justify-center group-hover:from-cyan-200 group-hover:to-blue-200 transition-colors group-hover:animate-float">
                        @include('public.partials.muscle-icon', ['slug' => $muscle->slug])
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-cyan-600 transition-colors">
                        {{ $muscle->name }}
                    </h3>
                    @if($muscle->description)
                        <p class="text-xs text-gray-500 mt-1">{{ \Illuminate\Support\Str::limit($muscle->description, 50) }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </section>

    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Mengapa SimpleWorkout?</h2>
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center p-6 rounded-xl bg-gradient-to-b from-emerald-50 to-white border border-emerald-100 hover:shadow-md transition-shadow duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-emerald-100 flex items-center justify-center group-hover:animate-float">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Video Terkurasi</h3>
                    <p class="text-sm text-gray-500">Video YouTube yang telah dipilih khusus untuk pemula — aman dan mudah diikuti.</p>
                </div>
                <div class="text-center p-6 rounded-xl bg-gradient-to-b from-cyan-50 to-white border border-cyan-100 hover:shadow-md transition-shadow duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-cyan-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Deskripsi Lengkap</h3>
                    <p class="text-sm text-gray-500">Step-by-step detail + daftar kesalahan umum agar Anda terhindar dari cedera.</p>
                </div>
                <div class="text-center p-6 rounded-xl bg-gradient-to-b from-blue-50 to-white border border-blue-100 hover:shadow-md transition-shadow duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Belajar Fleksibel</h3>
                    <p class="text-sm text-gray-500">Pilih bebas bagian otot yang ingin dipelajari — tanpa urutan kaku yang membosankan.</p>
                </div>
            </div>
        </div>
    </section>

    @if($pengaturan)
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Kontak Admin</h2>
            <div class="text-gray-600 text-sm space-y-1">
                @if($pengaturan->email_admin)
                    <p>Email: <a href="mailto:{{ $pengaturan->email_admin }}" class="text-cyan-600 hover:underline">{{ $pengaturan->email_admin }}</a></p>
                @endif
                @if($pengaturan->nomor_whatsapp_admin)
                    <p>WhatsApp: <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->nomor_whatsapp_admin) }}" class="text-emerald-600 hover:underline" target="_blank">{{ $pengaturan->nomor_whatsapp_admin }}</a></p>
                @endif
                @if($pengaturan->jam_operasional)
                    <p>Jam Operasional: {{ $pengaturan->jam_operasional }}</p>
                @endif
            </div>
        </section>
    @endif
@endsection
