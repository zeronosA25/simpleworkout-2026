@extends('public.layout')

@section('title', $workout->title)

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="text-sm text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-orange-400 transition-colors">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('muscle.show', $workout->muscleGroup->slug) }}" class="hover:text-orange-400 transition-colors">{{ $workout->muscleGroup->name }}</a>
            <span class="mx-2">/</span>
            <span class="text-slate-300 font-medium">{{ $workout->title }}</span>
        </nav>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                @if($workout->video_url)
                    <div class="bg-black rounded-xl overflow-hidden mb-6 aspect-video">
                        @php
                            $videoId = '';
                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $workout->video_url, $match)) {
                                $videoId = $match[1];
                            }
                        @endphp
                        @if($videoId)
                            <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}"
                                    frameborder="0" allowfullscreen
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                            </iframe>
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                @php
                                    $safeUrl = $workout->video_url;
                                    $isSafe = preg_match('/^https?:\/\//i', $safeUrl);
                                @endphp
                                @if($isSafe)
                                    <p>URL video tidak valid. <a href="{{ $safeUrl }}" target="_blank" rel="noopener noreferrer" class="text-blue-400 underline">Buka di YouTube</a></p>
                                @else
                                    <p>URL video tidak valid.</p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif

                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="text-xs bg-orange-500/20 text-orange-400 px-3 py-1 rounded-full font-medium">{{ $workout->muscleGroup->name }}</span>
                    <span class="text-xs bg-slate-700 text-slate-300 px-3 py-1 rounded-full font-medium">{{ $workout->type === 'gym' ? 'Gym Workout' : 'Home Workout' }}</span>
                    @foreach ($workout->equipments as $equip)
                        <span class="text-xs bg-emerald-500/20 text-emerald-400 px-3 py-1 rounded-full font-medium">{{ $equip->name }}</span>
                    @endforeach
                </div>

                <h1 class="text-3xl font-extrabold text-white mb-4">{{ $workout->title }}</h1>

                @if($workout->description)
                    <p class="text-slate-400 mb-8">{{ $workout->description }}</p>
                @endif

                @if($workout->guide)
                    <div class="bg-slate-800 rounded-2xl border border-slate-700 p-6 mb-6">
                        <h2 class="text-xl font-bold text-white mb-4">Panduan Gerakan (Step-by-Step)</h2>
                        <div class="prose prose-sm prose-invert max-w-none text-slate-300">
                            {!! strip_tags($workout->guide, '<p><br><b><i><strong><em><ul><ol><li><h2><h3><h4><a><img>') !!}
                        </div>
                    </div>
                @endif

                @if($workout->common_mistakes)
                    <div class="bg-red-500/10 rounded-2xl border border-red-500/30 p-6">
                        <h2 class="text-xl font-bold text-red-400 mb-4">
                            <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Kesalahan Umum
                        </h2>
                        <div class="prose prose-sm max-w-none text-red-300">
                            {!! strip_tags($workout->common_mistakes, '<p><br><b><i><strong><em><ul><ol><li><h2><h3><h4><a>') !!}
                        </div>
                    </div>
                @endif
            </div>

            <div class="lg:col-span-1">
                <div class="bg-slate-800 rounded-2xl border border-slate-700 p-6 sticky top-24">
                    <h3 class="font-bold text-white mb-3">Informasi Gerakan</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><strong class="text-slate-300">Bagian Otot:</strong> {{ $workout->muscleGroup->name }}</li>
                        <li><strong class="text-slate-300">Tipe:</strong> {{ $workout->type === 'gym' ? 'Gym Workout' : 'Home Workout' }}</li>
                        @if($workout->equipments->isNotEmpty())
                            <li><strong class="text-slate-300">Peralatan:</strong> {{ $workout->equipments->pluck('name')->join(', ') }}</li>
                        @endif
                    </ul>
                    <hr class="my-4 border-slate-700">
                    <a href="{{ route('muscle.show', $workout->muscleGroup->slug) }}"
                       class="block text-center text-orange-400 hover:text-orange-300 font-medium text-sm transition-colors">
                        &larr; Kembali ke {{ $workout->muscleGroup->name }}
                    </a>

                    <hr class="my-4 border-slate-700">
                    <h4 class="font-semibold text-white text-sm mb-3">Gerakan Lainnya</h4>
                    <livewire:workout-navigator :currentId="$workout->id" :muscleGroupId="$workout->muscleGroup->id" />
                </div>
            </div>
        </div>
    </div>
@endsection
