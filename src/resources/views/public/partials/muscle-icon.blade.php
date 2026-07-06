@props(['slug'])

@switch($slug)
    @case('dada')
        <svg class="w-8 h-8 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="6" y="4" width="12" height="8" rx="3"/>
            <line x1="8" y1="12" x2="8" y2="20"/>
            <line x1="16" y1="12" x2="16" y2="20"/>
            <line x1="6" y1="16" x2="10" y2="16"/>
            <line x1="14" y1="16" x2="18" y2="16"/>
        </svg>
        @break
    @case('bahu')
        <svg class="w-8 h-8 text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="6" r="4"/>
            <line x1="12" y1="10" x2="12" y2="18"/>
            <line x1="8" y1="14" x2="16" y2="14"/>
        </svg>
        @break
    @case('punggung')
        <svg class="w-8 h-8 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 4 L8 8 L4 8 L4 18 L8 18 L12 20 L16 18 L20 18 L20 8 L16 8 Z"/>
            <line x1="12" y1="8" x2="12" y2="18"/>
        </svg>
        @break
    @case('kaki')
        <svg class="w-8 h-8 text-purple-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="4" x2="12" y2="12"/>
            <path d="M7 12 L17 12 L19 20 L14 20 L13 17 L11 17 L10 20 L5 20 Z"/>
        </svg>
        @break
    @case('lengan')
        <svg class="w-8 h-8 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="6" r="4"/>
            <line x1="12" y1="10" x2="12" y2="14"/>
            <path d="M8 14 L6 20 L10 20 L12 17 L14 20 L18 20 L16 14"/>
        </svg>
        @break
    @case('perut')
        <svg class="w-8 h-8 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <ellipse cx="12" cy="12" rx="5" ry="8"/>
            <line x1="9" y1="8" x2="9" y2="16"/>
            <line x1="12" y1="7" x2="12" y2="17"/>
            <line x1="15" y1="8" x2="15" y2="16"/>
        </svg>
        @break
    @default
        <svg class="w-8 h-8 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="8" r="4"/>
            <path d="M12 12 L10 20 L8 18 L10 12"/>
            <path d="M12 12 L14 20 L16 18 L14 12"/>
            <line x1="12" y1="12" x2="12" y2="20"/>
        </svg>
@endswitch
