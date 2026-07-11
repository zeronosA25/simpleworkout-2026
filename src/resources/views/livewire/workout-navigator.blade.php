<div class="space-y-2">
    @if($prev)
        <a href="{{ route('workout.show', $prev['slug']) }}"
           class="flex items-center gap-2 px-4 py-3 bg-slate-700 border border-slate-600 rounded-xl text-sm text-slate-300 hover:border-orange-500/50 hover:text-orange-400 transition-colors">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span class="truncate">{{ $prev['title'] }}</span>
        </a>
    @endif

    @if($next)
        <a href="{{ route('workout.show', $next['slug']) }}"
           class="flex items-center justify-between gap-2 px-4 py-3 bg-slate-700 border border-slate-600 rounded-xl text-sm text-slate-300 hover:border-orange-500/50 hover:text-orange-400 transition-colors">
            <span class="truncate">{{ $next['title'] }}</span>
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    @endif
</div>
