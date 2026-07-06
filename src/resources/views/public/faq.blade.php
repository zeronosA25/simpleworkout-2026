@extends('public.layout')

@section('title', 'FAQ')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Pertanyaan Umum (FAQ)</h1>
        <p class="text-gray-500 mb-8">Jawaban atas pertanyaan yang sering diajukan oleh pengguna.</p>

        @if($faqs->isEmpty())
            <div class="text-center py-16 bg-white rounded-2xl border border-cyan-100 shadow-sm">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-cyan-100 to-blue-100 flex items-center justify-center">
                    <svg class="w-10 h-10 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum Ada Pertanyaan</h3>
                <p class="text-sm text-gray-500">Belum ada pertanyaan yang dipublikasikan saat ini.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($faqs as $faq)
                    <details class="bg-white rounded-xl shadow-sm border border-cyan-100 group hover:border-cyan-300 transition-colors">
                        <summary class="px-6 py-4 cursor-pointer font-semibold text-gray-800 hover:text-cyan-600 transition-colors flex justify-between items-center">
                            {{ $faq->pertanyaan }}
                            <svg class="w-5 h-5 text-cyan-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="px-6 pb-4 text-gray-600 text-sm leading-relaxed">
                            {!! strip_tags($faq->jawaban, '<p><br><b><i><strong><em><ul><ol><li><a>') !!}
                        </div>
                    </details>
                @endforeach
            </div>
        @endif
    </div>
@endsection
