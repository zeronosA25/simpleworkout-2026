<div>
    <div class="flex gap-2 mb-6">
        <button wire:click="setFilter('all')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors
                       {{ $filter === 'all' ? 'bg-gradient-to-r from-cyan-500 to-blue-500 text-white shadow-sm' : 'bg-white border border-cyan-200 text-gray-600 hover:border-cyan-400' }}">
                Semua
        </button>
        <button wire:click="setFilter('gym')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors
                       {{ $filter === 'gym' ? 'bg-gradient-to-r from-cyan-500 to-blue-500 text-white shadow-sm' : 'bg-white border border-cyan-200 text-gray-600 hover:border-cyan-400' }}">
            💪 Gym
        </button>
        <button wire:click="setFilter('home')"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors
                       {{ $filter === 'home' ? 'bg-gradient-to-r from-cyan-500 to-blue-500 text-white shadow-sm' : 'bg-white border border-cyan-200 text-gray-600 hover:border-cyan-400' }}">
            🏠 Home
        </button>
    </div>

    @if($workouts->isEmpty())
        <div class="text-center py-16 bg-white rounded-2xl border border-cyan-100 shadow-sm">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-cyan-100 to-blue-100 flex items-center justify-center">
                <svg class="w-10 h-10 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum Ada Gerakan</h3>
            <p class="text-sm text-gray-500">Belum ada gerakan {{ $filter !== 'all' ? ($filter === 'gym' ? 'Gym' : 'Home') : '' }} tersedia untuk bagian otot ini.</p>
        </div>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($workouts as $workout)
                <a href="{{ route('workout.show', $workout->slug) }}"
                   class="bg-white rounded-xl shadow-sm hover:shadow-md border border-cyan-100 hover:border-cyan-400 transition-all overflow-hidden group">
                    @if($workout->image)
                        <img src="{{ asset('storage/' . $workout->image) }}" alt="{{ $workout->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center">
                            <span class="text-white text-4xl font-bold">{{ \Illuminate\Support\Str::limit($workout->title, 2, '') }}</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 group-hover:text-cyan-600 transition-colors mb-1">{{ $workout->title }}</h3>
                        <span class="text-xs text-white {{ $workout->type === 'gym' ? 'bg-emerald-500' : 'bg-blue-500' }} px-2 py-1 rounded-full">
                            {{ $workout->type === 'gym' ? 'Gym' : 'Home' }}
                        </span>
                        @if($workout->description)
                            <p class="text-sm text-gray-500 mt-2">{{ \Illuminate\Support\Str::limit($workout->description, 80) }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
