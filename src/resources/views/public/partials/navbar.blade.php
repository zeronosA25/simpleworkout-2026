<nav class="bg-slate-900/95 backdrop-blur-sm border-b border-slate-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-orange-500 tracking-tight">
                    {{ $pengaturan?->nama_website ?? 'SimpleWorkout' }}
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
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-400 hover:text-red-400 px-3 py-2 text-sm font-medium rounded-lg transition-colors">
                            Logout
                        </button>
                    </form>
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
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-400 rounded-lg px-3 py-2 text-sm font-medium w-full text-left hover:bg-red-500/10">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-slate-300 rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-800 hover:text-orange-400">Login</a>
                <a href="{{ route('register') }}" class="block text-center bg-orange-500 text-white rounded-lg px-3 py-2 text-sm font-semibold mt-2">Daftar</a>
            @endauth
        </div>
    </div>
</nav>
