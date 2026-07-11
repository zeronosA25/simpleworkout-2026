@extends('public.layout')

@section('title', 'FAQ & Kirim Saran')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Pertanyaan Umum (FAQ)</h1>
        <p class="text-gray-500 mb-8">Jawaban atas pertanyaan yang sering diajukan oleh pengguna.</p>

        <livewire:faq-accordion />

        <livewire:saran-form />
    </div>
@endsection
