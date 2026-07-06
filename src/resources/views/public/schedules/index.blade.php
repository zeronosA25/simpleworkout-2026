@extends('public.layout')

@section('title', 'Jadwal Latihan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Template Jadwal Latihan</h1>
        <p class="text-gray-500 mb-8">Pilih template jadwal latihan sebagai panduan mingguan Anda. Centang hari yang sudah Anda selesaikan.</p>

        @if($templates->isEmpty())
            <div class="text-center py-16 bg-white rounded-2xl border border-cyan-100 shadow-sm">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-cyan-100 to-blue-100 flex items-center justify-center">
                    <svg class="w-10 h-10 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum Ada Jadwal</h3>
                <p class="text-sm text-gray-500">Belum ada template jadwal latihan tersedia.</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($templates as $template)
                    <a href="{{ route('schedules.show', $template->slug) }}"
                       class="bg-white rounded-xl shadow-sm hover:shadow-md border border-cyan-100 hover:border-cyan-400 transition-all p-6 group">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $template->nama_template }}</h3>
                        @if($template->deskripsi)
                            <p class="text-sm text-gray-500 mb-3">{{ Str::limit($template->deskripsi, 100) }}</p>
                        @endif
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-400">{{ $template->jumlah_hari_per_minggu }} Hari/Minggu</span>
                            <span class="text-cyan-600 font-medium group-hover:text-cyan-700">Lihat Jadwal &rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
