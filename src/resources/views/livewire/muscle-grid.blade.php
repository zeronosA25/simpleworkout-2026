<div>
    <div class="flex gap-2 mb-6">
        <button wire:click="setFilter('all')"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all
                       {{ $filter === 'all' ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'bg-slate-800 border border-slate-700 text-slate-400 hover:border-slate-600 hover:text-white' }}">
            Semua
        </button>
        <button wire:click="setFilter('gym')"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all
                       {{ $filter === 'gym' ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'bg-slate-800 border border-slate-700 text-slate-400 hover:border-slate-600 hover:text-white' }}">
            💪 Gym
        </button>
        <button wire:click="setFilter('home')"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all
                       {{ $filter === 'home' ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'bg-slate-800 border border-slate-700 text-slate-400 hover:border-slate-600 hover:text-white' }}">
            🏠 Home
        </button>
    </div>

    @if($workouts->isEmpty())
        <div class="text-center py-16 bg-slate-800 rounded-2xl border border-slate-700">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-slate-700 flex items-center justify-center">
                <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-300 mb-1">Belum Ada Gerakan</h3>
            <p class="text-sm text-slate-500">Belum ada gerakan {{ $filter !== 'all' ? ($filter === 'gym' ? 'Gym' : 'Home') : '' }} tersedia untuk bagian otot ini.</p>
        </div>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($workouts as $workout)
                <a href="{{ route('workout.show', $workout->slug) }}"
                   class="bg-slate-800 rounded-2xl border border-slate-700 hover:border-orange-500/50 transition-all overflow-hidden group hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-500/5">
                    @if($workout->image)
                        <img src="{{ asset('storage/' . $workout->image) }}" alt="{{ $workout->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-orange-500/20 to-slate-700 flex items-center justify-center">
                            <span class="text-slate-500 text-4xl font-bold">{{ \Illuminate\Support\Str::limit($workout->title, 2, '') }}</span>
                        </div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-bold text-white group-hover:text-orange-400 transition-colors mb-2">{{ $workout->title }}</h3>
                        <span class="text-xs text-white {{ $workout->type === 'gym' ? 'bg-orange-500' : 'bg-emerald-500' }} px-3 py-1 rounded-full font-semibold">
                            {{ $workout->type === 'gym' ? 'Gym' : 'Home' }}
                        </span>
                        @if($workout->description)
                            <p class="text-sm text-slate-400 mt-3">{{ \Illuminate\Support\Str::limit($workout->description, 80) }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
