<nav class="bg-white shadow-sm border-b border-cyan-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent">
                    {{ $pengaturan?->nama_website ?? 'SimpleWorkout' }}
                </a>
            </div>
            <div class="hidden sm:flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-cyan-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-cyan-600' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('schedules.index') }}" class="text-gray-700 hover:text-cyan-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('schedules.*') ? 'text-cyan-600' : '' }}">
                    Jadwal Latihan
                </a>
                <a href="{{ route('faq.index') }}" class="text-gray-700 hover:text-cyan-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('faq.*') ? 'text-cyan-600' : '' }}">
                    FAQ & Kirim Saran
                </a>
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-cyan-600 px-3 py-2 text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-4 py-2 rounded-md text-sm font-medium hover:from-cyan-600 hover:to-blue-600 shadow-sm">
                        Daftar
                    </a>
                @endauth
            </div>
            <div class="sm:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-cyan-600 p-2" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu" class="hidden sm:hidden border-t border-cyan-100 bg-white shadow-lg">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="block text-gray-700 rounded-lg px-3 py-2 text-sm font-medium hover:bg-cyan-50 hover:text-cyan-600 {{ request()->routeIs('home') ? 'bg-cyan-50 text-cyan-600' : '' }}">Beranda</a>
            <a href="{{ route('schedules.index') }}" class="block text-gray-700 rounded-lg px-3 py-2 text-sm font-medium hover:bg-cyan-50 hover:text-cyan-600 {{ request()->routeIs('schedules.*') ? 'bg-cyan-50 text-cyan-600' : '' }}">Jadwal Latihan</a>
            <a href="{{ route('faq.index') }}" class="block text-gray-700 rounded-lg px-3 py-2 text-sm font-medium hover:bg-cyan-50 hover:text-cyan-600 {{ request()->routeIs('faq.*') ? 'bg-cyan-50 text-cyan-600' : '' }}">FAQ & Kirim Saran</a>
            <hr class="my-2 border-cyan-100">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 rounded-lg px-3 py-2 text-sm font-medium w-full text-left hover:bg-red-50">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-gray-700 rounded-lg px-3 py-2 text-sm font-medium hover:bg-cyan-50 hover:text-cyan-600">Login</a>
                <a href="{{ route('register') }}" class="block text-center bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-lg px-3 py-2 text-sm font-medium mt-2">Daftar</a>
            @endauth
        </div>
    </div>
</nav>
