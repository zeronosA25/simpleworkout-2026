<div class="space-y-3">
    @if($prev)
        <a href="{{ route('workout.show', $prev['slug']) }}"
           class="flex items-center gap-2 px-4 py-2 bg-white border border-cyan-100 rounded-lg text-sm text-gray-600 hover:border-cyan-400 hover:text-cyan-600 transition-colors">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span class="truncate">{{ $prev['title'] }}</span>
        </a>
    @endif

    @if($next)
        <a href="{{ route('workout.show', $next['slug']) }}"
           class="flex items-center justify-between gap-2 px-4 py-2 bg-white border border-cyan-100 rounded-lg text-sm text-gray-600 hover:border-cyan-400 hover:text-cyan-600 transition-colors">
            <span class="truncate">{{ $next['title'] }}</span>
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    @endif
</div>
