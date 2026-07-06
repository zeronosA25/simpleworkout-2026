@extends('public.layout')

@section('title', $template->nama_template)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-cyan-600">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('schedules.index') }}" class="hover:text-cyan-600">Jadwal Latihan</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">{{ $template->nama_template }}</span>
        </nav>

        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $template->nama_template }}</h1>
        @if($template->deskripsi)
            <p class="text-gray-500 mb-8">{{ $template->deskripsi }}</p>
        @endif

        <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-cyan-100">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-cyan-50 to-blue-50 border-b border-cyan-200">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-cyan-800 w-32">Hari</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-cyan-800">Daftar Gerakan</th>
                        @auth
                            <th class="px-6 py-4 text-center text-sm font-semibold text-cyan-800 w-28">Selesai</th>
                        @endauth
                    </tr>
                </thead>
                <tbody class="divide-y divide-cyan-50">
                    @foreach ($template->hariJadwal as $hari)
                        <tr class="hover:bg-cyan-50/50">
                            <td class="px-6 py-4">
                                <span class="font-semibold text-gray-800">{{ $hari->nama_hari }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($hari->detailJadwal->isEmpty())
                                    <span class="text-sm text-cyan-400 italic">—</span>
                                @else
                                    <div class="space-y-1">
                                        @foreach ($hari->detailJadwal as $detail)
                                            @if($detail->workout)
                                                <a href="{{ route('workout.show', $detail->workout->slug) }}"
                                                   class="block text-sm text-cyan-600 hover:text-cyan-800 hover:underline">
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
            <div class="mt-6 text-center py-4 bg-gradient-to-r from-cyan-50 to-blue-50 rounded-lg border border-cyan-200">
                <p class="text-cyan-700 text-sm">
                    <a href="{{ route('login') }}" class="font-semibold underline">Login</a> untuk mencentang hari yang sudah Anda selesaikan sebagai catatan pribadi.
                </p>
            </div>
        @endguest
    </div>
@endsection
