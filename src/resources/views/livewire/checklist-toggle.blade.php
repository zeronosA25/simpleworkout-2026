<button type="button"
    wire:click="toggle"
    class="w-8 h-8 rounded-lg border-2 transition-all
           {{ $isChecked ? 'bg-green-500 border-green-500 text-white' : 'border-gray-300 hover:border-green-400 text-transparent hover:text-gray-300' }}">
    <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
    </svg>
</button>
