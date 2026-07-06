<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:from-cyan-600 hover:to-blue-600 focus:from-cyan-600 focus:to-blue-600 active:from-cyan-700 active:to-blue-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm']) }}>
    {{ $slot }}
</button>
