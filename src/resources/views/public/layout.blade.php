<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        try {
            $pengaturan = \App\Models\PengaturanWebsite::first();
        } catch (\Exception $e) {
            $pengaturan = null;
        }
    @endphp
    <meta name="description" content="@yield('description', $pengaturan?->deskripsi_singkat_website ?? 'Platform tutorial workout gym untuk pemula berbasis web.')">
    <meta name="author" content="{{ $pengaturan?->nama_website ?? 'SimpleWorkout' }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="@hasSection('title')@yield('title') - @endif{{ $pengaturan?->nama_website ?? 'SimpleWorkout' }}">
    <meta property="og:description" content="@yield('description', $pengaturan?->deskripsi_singkat_website ?? 'Platform tutorial workout gym untuk pemula.')">
    <meta property="og:type" content="website">
    @if($pengaturan?->logo)
    <meta property="og:image" content="{{ asset('storage/' . $pengaturan?->logo) }}">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">

    <title>@hasSection('title')@yield('title') - @endif{{ $pengaturan?->nama_website ?? 'SimpleWorkout' }}</title>

    @if($pengaturan?->favicon)
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $pengaturan?->favicon) }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('head')
</head>
<body class="bg-gradient-to-br from-cyan-50 via-white to-emerald-50 min-h-screen flex flex-col">
    @include('public.partials.navbar', ['pengaturan' => $pengaturan])

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('public.partials.footer', ['pengaturan' => $pengaturan])

    @livewireScripts
    @stack('scripts')
</body>
</html>
