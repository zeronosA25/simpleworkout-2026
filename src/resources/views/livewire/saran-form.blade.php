<div class="border-t border-cyan-100 pt-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Kirim Saran / Kritik</h2>
    <p class="text-gray-500 mb-6">Sampaikan saran atau kritik Anda untuk perbaikan konten. Pilih kategori yang sesuai.</p>

    @if($submitted)
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-xl">
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="font-medium">{{ $successMessage }}</span>
            </div>
        </div>
    @endif

    <form wire:submit="submit" class="bg-white rounded-xl shadow-sm border border-cyan-100 p-6 space-y-6">
        <div>
            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
            <select wire:model="kategori" id="kategori"
                    class="w-full border border-cyan-200 rounded-lg px-4 py-2 text-gray-700 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-colors">
                <option value="">Pilih Kategori</option>
                <option value="Teknis">Teknis (Bug / Error Website)</option>
                <option value="Kritik Video/Deskripsi">Kritik Video / Deskripsi</option>
                <option value="Saran Gerakan Baru">Saran Gerakan Baru</option>
            </select>
            @error('kategori')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="pesan" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
            <textarea wire:model.live.debounce.300ms="pesan" id="pesan" rows="6"
                      class="w-full border rounded-lg px-4 py-2 text-gray-700 transition-colors
                             {{ $errors->has('pesan') ? 'border-red-300 focus:border-red-500 focus:ring-red-200' : 'border-cyan-200 focus:border-cyan-500 focus:ring-cyan-200' }}"
                      placeholder="Tulis saran atau kritik Anda di sini..."></textarea>
            <div class="flex justify-between mt-1">
                <p class="text-xs {{ $errors->has('pesan') ? 'text-red-500' : 'text-gray-400' }}">
                    @error('pesan') {{ $message }} @else Minimal 10 karakter, maksimal 2000 karakter. @enderror
                </p>
                <p class="text-xs {{ strlen($pesan) > 2000 ? 'text-red-500' : 'text-gray-400' }}">
                    {{ strlen($pesan) }}/2000
                </p>
            </div>
        </div>

        <div>
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-medium px-6 py-3 rounded-lg hover:from-cyan-600 hover:to-blue-600 transition-colors shadow-sm disabled:opacity-50">
                <span wire:loading.remove>Kirim Saran / Kritik</span>
                <span wire:loading class="inline-flex items-center gap-2">
                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    Mengirim...
                </span>
            </button>
        </div>
    </form>
</div>
