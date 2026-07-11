<button type="button"
    wire:click="toggle"
    class="w-9 h-9 rounded-xl border-2 transition-all
           {{ $isChecked ? 'bg-emerald-500 border-emerald-500 text-white shadow-lg shadow-emerald-500/30' : 'border-slate-600 hover:border-emerald-500/50 text-transparent hover:text-slate-500' }}">
    <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
    </svg>
</button>
