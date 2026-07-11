@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-slate-900 border-slate-700 text-white placeholder-slate-500 focus:border-orange-500 focus:ring-orange-500/20 rounded-xl shadow-sm']) }}>
