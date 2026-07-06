@extends('public.layout')

@section('title', 'Saran & Kritik')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Saran & Kritik</h1>
        <p class="text-gray-500 mb-8">Sampaikan saran atau kritik Anda untuk perbaikan konten. Pilih kategori yang sesuai.</p>

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
@endsection
