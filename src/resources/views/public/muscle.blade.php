@extends('public.layout')

@section('title', $muscle->name)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="text-sm text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-orange-400 transition-colors">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-slate-300 font-medium">{{ $muscle->name }}</span>
        </nav>

        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-white">Gerakan {{ $muscle->name }}</h1>
            @if($muscle->description)
                <p class="text-slate-400 mt-2">{{ $muscle->description }}</p>
            @endif
        </div>

        @if($workouts->isEmpty())
            <div class="text-center py-16 bg-slate-800 rounded-2xl border border-slate-700">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-slate-700 flex items-center justify-center">
                    <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-300 mb-1">Belum Ada Gerakan</h3>
                <p class="text-sm text-slate-500">Belum ada gerakan tersedia untuk bagian otot ini.</p>
            </div>
        @else
            <livewire:muscle-grid :slug="$muscle->slug" />
        @endif
    </div>
@endsection
