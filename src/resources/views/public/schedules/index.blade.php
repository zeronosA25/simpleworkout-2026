@extends('public.layout')

@section('title', 'Jadwal Latihan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-extrabold text-white mb-2">Template Jadwal Latihan</h1>
        <p class="text-slate-400 mb-8">Pilih template jadwal latihan sebagai panduan mingguan Anda. Centang hari yang sudah Anda selesaikan.</p>

        @if($templates->isEmpty())
            <div class="text-center py-16 bg-slate-800 rounded-2xl border border-slate-700">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-slate-700 flex items-center justify-center">
                    <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-300 mb-1">Belum Ada Jadwal</h3>
                <p class="text-sm text-slate-500">Belum ada template jadwal latihan tersedia.</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($templates as $template)
                    <a href="{{ route('schedules.show', $template->slug) }}"
                       class="bg-slate-800 rounded-2xl border border-slate-700 hover:border-orange-500/50 transition-all p-6 group hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/5">
                        <h3 class="font-bold text-lg text-white group-hover:text-orange-400 transition-colors mb-2">{{ $template->nama_template }}</h3>
                        @if($template->deskripsi)
                            <p class="text-sm text-slate-400 mb-4">{{ Str::limit($template->deskripsi, 100) }}</p>
                        @endif
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500">{{ $template->jumlah_hari_per_minggu }} Hari/Minggu</span>
                            <span class="text-orange-400 font-medium group-hover:text-orange-300">Lihat Jadwal &rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
