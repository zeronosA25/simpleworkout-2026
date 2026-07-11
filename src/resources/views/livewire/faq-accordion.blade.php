<div>
    <div class="mb-6">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input
                type="text"
                wire:model.live.debounce.250ms="search"
                placeholder="Cari pertanyaan..."
                class="w-full pl-10 pr-4 py-3 bg-slate-800 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition-colors"
            >
        </div>
    </div>

    @if($faqs->isEmpty())
        <div class="text-center py-16 bg-slate-800 rounded-2xl border border-slate-700">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-slate-700 flex items-center justify-center">
                <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-300 mb-1">
                {{ $search ? 'Tidak Ditemukan' : 'Belum Ada Pertanyaan' }}
            </h3>
            <p class="text-sm text-slate-500">
                {{ $search ? 'Tidak ada FAQ yang cocok dengan "' . $search . '"' : 'Belum ada pertanyaan yang dipublikasikan saat ini.' }}
            </p>
        </div>
    @else
        <div class="space-y-3 mb-12">
            @foreach ($faqs as $faq)
                <div class="bg-slate-800 rounded-xl border transition-all
                    {{ $activeId === $faq->id ? 'border-orange-500/50 shadow-lg shadow-orange-500/5' : 'border-slate-700 hover:border-slate-600' }}"
                >
                    <button
                        wire:click="toggle({{ $faq->id }})"
                        class="w-full px-6 py-4 text-left cursor-pointer font-semibold text-white hover:text-orange-400 transition-colors flex justify-between items-center"
                    >
                        {{ $faq->pertanyaan }}
                        <svg class="w-5 h-5 text-slate-500 transition-transform {{ $activeId === $faq->id ? 'rotate-180 text-orange-400' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    @if($activeId === $faq->id)
                        <div class="px-6 pb-4 text-slate-300 text-sm leading-relaxed border-t border-slate-700 pt-4">
                            {!! strip_tags($faq->jawaban, '<p><br><b><i><strong><em><ul><ol><li><a>') !!}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
