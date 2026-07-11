@extends('public.layout')

@section('title', 'FAQ & Kirim Saran')

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
            <div class="space-y-4 mb-12">
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

        <div class="border-t border-cyan-100 pt-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Kirim Saran / Kritik</h2>
            <p class="text-gray-500 mb-6">Sampaikan saran atau kritik Anda untuk perbaikan konten. Pilih kategori yang sesuai.</p>

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl">
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <form action="{{ route('saran.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-cyan-100 p-6 space-y-6">
                @csrf

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="kategori" id="kategori" required
                            class="w-full border border-cyan-200 rounded-lg px-4 py-2 text-gray-700 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-colors">
                        <option value="">Pilih Kategori</option>
                        <option value="Teknis" {{ old('kategori') === 'Teknis' ? 'selected' : '' }}>Teknis (Bug / Error Website)</option>
                        <option value="Kritik Video/Deskripsi" {{ old('kategori') === 'Kritik Video/Deskripsi' ? 'selected' : '' }}>Kritik Video / Deskripsi</option>
                        <option value="Saran Gerakan Baru" {{ old('kategori') === 'Saran Gerakan Baru' ? 'selected' : '' }}>Saran Gerakan Baru</option>
                    </select>
                    @error('kategori')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="pesan" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                    <textarea name="pesan" id="pesan" rows="6" required minlength="10" maxlength="2000"
                              class="w-full border border-cyan-200 rounded-lg px-4 py-2 text-gray-700 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-colors"
                              placeholder="Tulis saran atau kritik Anda di sini...">{{ old('pesan') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Minimal 10 karakter, maksimal 2000 karakter.</p>
                    @error('pesan')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-medium px-6 py-3 rounded-lg hover:from-cyan-600 hover:to-blue-600 transition-colors shadow-sm">
                        Kirim Saran / Kritik
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
