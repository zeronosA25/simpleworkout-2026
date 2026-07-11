@extends('public.layout')

@section('title', $template->nama_template)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="text-sm text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-orange-400 transition-colors">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('schedules.index') }}" class="hover:text-orange-400 transition-colors">Jadwal Latihan</a>
            <span class="mx-2">/</span>
            <span class="text-slate-300 font-medium">{{ $template->nama_template }}</span>
        </nav>

        <h1 class="text-3xl font-extrabold text-white mb-2">{{ $template->nama_template }}</h1>
        @if($template->deskripsi)
            <p class="text-slate-400 mb-8">{{ $template->deskripsi }}</p>
        @endif

        @auth
            @if(empty($checklist))
            <div class="mb-6 text-center">
                <form action="{{ route('schedules.subscribe', $template->slug) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center gap-2 bg-orange-500 text-white font-bold px-6 py-3 rounded-xl hover:bg-orange-600 transition-colors shadow-lg shadow-orange-500/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Mulai Jadwal Ini
                    </button>
                </form>
                <p class="text-xs text-slate-500 mt-2">Kamu akan menerima pengingat email setiap pagi untuk jadwal ini.</p>
            </div>
            @endif
        @endauth

        @if(session('success'))
            <div class="mb-6 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-6 py-4 rounded-xl">
                <div class="flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto bg-slate-800 rounded-2xl border border-slate-700">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-700/50 border-b border-slate-700">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-orange-400 w-32">Hari</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-orange-400">Daftar Gerakan</th>
                        @auth
                            <th class="px-6 py-4 text-center text-sm font-semibold text-orange-400 w-28">Selesai</th>
                        @endauth
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @foreach ($template->hariJadwal as $hari)
                        <tr class="hover:bg-slate-700/30">
                            <td class="px-6 py-4">
                                <span class="font-semibold text-white">{{ $hari->nama_hari }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($hari->detailJadwal->isEmpty())
                                    <span class="text-sm text-slate-600 italic">—</span>
                                @else
                                    <div class="space-y-1">
                                        @foreach ($hari->detailJadwal as $detail)
                                            @if($detail->workout)
                                                <a href="{{ route('workout.show', $detail->workout->slug) }}"
                                                   class="block text-sm text-orange-400 hover:text-orange-300 hover:underline">
                                                    {{ $loop->iteration }}. {{ $detail->workout->title }}
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                            @auth
                                <td class="px-6 py-4 text-center">
                                    <livewire:checklist-toggle :hariJadwalId="$hari->id" :isChecked="isset($checklist[$hari->id]) && $checklist[$hari->id]" />
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @guest
            <div class="mt-6 text-center py-4 bg-slate-800 rounded-xl border border-slate-700">
                <p class="text-slate-400 text-sm">
                    <a href="{{ route('login') }}" class="text-orange-400 font-semibold hover:underline">Login</a> untuk mencentang hari yang sudah Anda selesaikan sebagai catatan pribadi.
                </p>
            </div>
        @endguest
    </div>
@endsection
