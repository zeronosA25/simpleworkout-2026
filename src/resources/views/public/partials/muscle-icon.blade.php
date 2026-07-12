@props(['slug'])

@switch($slug)
    {{-- Dada - Front body, chest highlighted --}}
    @case('dada')
        <svg class="w-10 h-10 text-orange-400 group-hover:text-orange-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <ellipse cx="12" cy="6" rx="3.5" ry="3"/>
            <line x1="12" y1="9" x2="12" y2="11"/>
            <rect x="7" y="10" width="10" height="5" rx="1" fill="currentColor" opacity="0.35" stroke="none"/>
            <rect x="7" y="10" width="10" height="5" rx="1"/>
            <line x1="10" y1="15" x2="10" y2="20"/>
            <line x1="14" y1="15" x2="14" y2="20"/>
            <line x1="8" y1="16" x2="16" y2="16"/>
        </svg>
        @break

    {{-- Bahu - Front body, shoulders highlighted --}}
    @case('bahu')
        <svg class="w-10 h-10 text-orange-400 group-hover:text-orange-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <ellipse cx="12" cy="6" rx="3.5" ry="3"/>
            <circle cx="8" cy="10" r="2" fill="currentColor" opacity="0.35" stroke="none"/>
            <circle cx="16" cy="10" r="2" fill="currentColor" opacity="0.35" stroke="none"/>
            <line x1="12" y1="9" x2="12" y2="18"/>
            <line x1="8" y1="12" x2="8" y2="18"/>
            <line x1="16" y1="12" x2="16" y2="18"/>
            <line x1="7" y1="18" x2="17" y2="18"/>
        </svg>
        @break

    {{-- Punggung - Rear body, back highlighted --}}
    @case('punggung')
        <svg class="w-10 h-10 text-orange-400 group-hover:text-orange-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <ellipse cx="12" cy="6" rx="3.5" ry="3"/>
            <line x1="12" y1="9" x2="12" y2="18"/>
            <path d="M7 10 L9 18 L10 19 L12 18 L14 19 L15 18 L17 10" fill="currentColor" opacity="0.35" stroke="none"/>
            <path d="M7 10 L9 18 L10 19 L12 18 L14 18 L17 10"/>
            <line x1="7" y1="18" x2="17" y2="18"/>
        </svg>
        @break

    {{-- Kaki - Front body, legs highlighted --}}
    @case('kaki')
        <svg class="w-10 h-10 text-orange-400 group-hover:text-orange-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <ellipse cx="12" cy="6" rx="3.5" ry="3"/>
            <line x1="12" y1="9" x2="12" y2="11"/>
            <rect x="9" y="10" width="6" height="3" rx="0.5"/>
            <rect x="9" y="12" width="2.5" height="8" rx="0.5" fill="currentColor" opacity="0.35" stroke="none"/>
            <rect x="12.5" y="12" width="2.5" height="8" rx="0.5" fill="currentColor" opacity="0.35" stroke="none"/>
            <line x1="9" y1="13" x2="9" y2="19"/>
            <line x1="15" y1="13" x2="15" y2="19"/>
            <line x1="8" y1="19" x2="11.5" y2="19"/>
            <line x1="12.5" y1="19" x2="16" y2="19"/>
        </svg>
        @break

    {{-- Lengan - Front body, arms highlighted --}}
    @case('lengan')
        <svg class="w-10 h-10 text-orange-400 group-hover:text-orange-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <ellipse cx="12" cy="6" rx="3.5" ry="3"/>
            <line x1="12" y1="9" x2="12" y2="17"/>
            <rect x="9" y="11" width="6" height="3" rx="0.5"/>
            <path d="M5 12 L7 18 L12 17" fill="currentColor" opacity="0.35" stroke="none"/>
            <path d="M19 12 L17 18 L12 17" fill="currentColor" opacity="0.35" stroke="none"/>
            <line x1="5" y1="12" x2="9" y2="12"/>
            <line x1="15" y1="12" x2="19" y2="12"/>
            <line x1="7" y1="14" x2="7" y2="18"/>
            <line x1="17" y1="14" x2="17" y2="18"/>
            <line x1="6" y1="18" x2="8" y2="18"/>
            <line x1="16" y1="18" x2="18" y2="18"/>
        </svg>
        @break

    {{-- Perut - Front body, abs highlighted --}}
    @case('perut')
        <svg class="w-10 h-10 text-orange-400 group-hover:text-orange-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <ellipse cx="12" cy="6" rx="3.5" ry="3"/>
            <line x1="12" y1="9" x2="12" y2="11"/>
            <rect x="9" y="10" width="6" height="2" rx="0.3"/>
            <rect x="9" y="12" width="6" height="5" rx="1" fill="currentColor" opacity="0.35" stroke="none"/>
            <rect x="9" y="12" width="6" height="5" rx="1"/>
            <line x1="10" y1="17" x2="10" y2="19"/>
            <line x1="14" y1="17" x2="14" y2="19"/>
            <line x1="8" y1="19" x2="16" y2="19"/>
        </svg>
        @break

    {{-- Default - Full body outline --}}
    @default
        <svg class="w-10 h-10 text-orange-400 group-hover:text-orange-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <ellipse cx="12" cy="6" rx="3.5" ry="3"/>
            <line x1="12" y1="9" x2="12" y2="19"/>
            <line x1="8" y1="12" x2="8" y2="19"/>
            <line x1="16" y1="12" x2="16" y2="19"/>
            <line x1="7" y1="19" x2="17" y2="19"/>
        </svg>
@endswitch
