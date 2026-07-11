<div class="border-t border-slate-800 pt-8">
    <h2 class="text-2xl font-extrabold text-white mb-2">Kirim Saran / Kritik</h2>
    <p class="text-slate-400 mb-6">Sampaikan saran atau kritik Anda untuk perbaikan konten. Pilih kategori yang sesuai.</p>

    @if($submitted)
        <div class="mb-6 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-6 py-4 rounded-xl">
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="font-medium">{{ $successMessage }}</span>
            </div>
        </div>
    @endif

    <form wire:submit="submit" class="bg-slate-800 rounded-2xl border border-slate-700 p-6 space-y-6">
        <div>
            <label for="kategori" class="block text-sm font-medium text-slate-300 mb-2">Kategori</label>
            <select wire:model="kategori" id="kategori"
                    class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition-colors">
                <option value="">Pilih Kategori</option>
                <option value="Teknis">Teknis (Bug / Error Website)</option>
                <option value="Kritik Video/Deskripsi">Kritik Video / Deskripsi</option>
                <option value="Saran Gerakan Baru">Saran Gerakan Baru</option>
            </select>
            @error('kategori')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="pesan" class="block text-sm font-medium text-slate-300 mb-2">Pesan</label>
            <textarea wire:model.live.debounce.300ms="pesan" id="pesan" rows="6"
                      class="w-full bg-slate-900 border rounded-xl px-4 py-3 text-white placeholder-slate-500 transition-colors
                             {{ $errors->has('pesan') ? 'border-red-500/50 focus:border-red-500 focus:ring-red-500/20' : 'border-slate-700 focus:border-orange-500 focus:ring-orange-500/20' }}"
                      placeholder="Tulis saran atau kritik Anda di sini..."></textarea>
            <div class="flex justify-between mt-1">
                <p class="text-xs {{ $errors->has('pesan') ? 'text-red-400' : 'text-slate-500' }}">
                    @error('pesan') {{ $message }} @else Minimal 10 karakter, maksimal 2000 karakter. @enderror
                </p>
                <p class="text-xs {{ strlen($pesan) > 2000 ? 'text-red-400' : 'text-slate-500' }}">
                    {{ strlen($pesan) }}/2000
                </p>
            </div>
        </div>

        <div>
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full bg-orange-500 text-white font-bold px-6 py-3.5 rounded-xl hover:bg-orange-600 transition-colors shadow-lg shadow-orange-500/20 disabled:opacity-50">
                <span wire:loading.remove>Kirim Saran / Kritik</span>
                <span wire:loading class="inline-flex items-center gap-2 justify-center">
                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    Mengirim...
                </span>
            </button>
        </div>
    </form>
</div>
