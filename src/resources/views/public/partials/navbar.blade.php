<nav class="bg-slate-900/95 backdrop-blur-sm border-b border-slate-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <x-application-logo class="w-8 h-8 text-orange-500" />
                    <span class="text-xl font-bold text-orange-500 tracking-tight">
                        {{ $pengaturan?->nama_website ?? 'SimpleWorkout' }}
                    </span>
                </a>
            </div>
            <div class="hidden sm:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="text-slate-300 hover:text-orange-400 px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('home') ? 'bg-slate-800 text-orange-400' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('schedules.index') }}" class="text-slate-300 hover:text-orange-400 px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('schedules.*') ? 'bg-slate-800 text-orange-400' : '' }}">
                    Jadwal Latihan
                </a>
                <a href="{{ route('faq.index') }}" class="text-slate-300 hover:text-orange-400 px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('faq.*') ? 'bg-slate-800 text-orange-400' : '' }}">
                    FAQ & Kirim Saran
                </a>
                @auth
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                            <div class="w-9 h-9 rounded-full bg-orange-500 flex items-center justify-center text-sm font-bold text-white shadow-md shadow-orange-500/30 hover:bg-orange-600 transition-colors">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-56 bg-slate-800 border border-slate-700 rounded-xl shadow-xl z-50 overflow-hidden" style="display: none;">
                            <div class="px-4 py-3 border-b border-slate-700">
                                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Profil
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-slate-300 hover:bg-red-500/10 hover:text-red-400 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-orange-400 px-3 py-2 text-sm font-medium rounded-lg transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-orange-500 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-colors shadow-lg shadow-orange-500/20">
                        Daftar
                    </a>
                @endauth
            </div>
            <div class="sm:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-orange-400 p-2" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu" class="hidden sm:hidden border-t border-slate-800 bg-slate-900 shadow-xl">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="block text-slate-300 rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-800 hover:text-orange-400 {{ request()->routeIs('home') ? 'bg-slate-800 text-orange-400' : '' }}">Beranda</a>
            <a href="{{ route('schedules.index') }}" class="block text-slate-300 rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-800 hover:text-orange-400 {{ request()->routeIs('schedules.*') ? 'bg-slate-800 text-orange-400' : '' }}">Jadwal Latihan</a>
            <a href="{{ route('faq.index') }}" class="block text-slate-300 rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-800 hover:text-orange-400 {{ request()->routeIs('faq.*') ? 'bg-slate-800 text-orange-400' : '' }}">FAQ & Kirim Saran</a>
            <hr class="my-2 border-slate-700">
            @auth
                <div class="pt-2 border-t border-slate-700">
                    <div class="flex items-center gap-3 px-3 py-2">
                        <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-center text-sm font-bold text-white flex-shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="mt-1 space-y-1">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-red-400 hover:bg-red-500/10 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="block text-slate-300 rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-800 hover:text-orange-400">Login</a>
                <a href="{{ route('register') }}" class="block text-center bg-orange-500 text-white rounded-lg px-3 py-2 text-sm font-semibold mt-2">Daftar</a>
            @endauth
        </div>
    </div>
</nav>
