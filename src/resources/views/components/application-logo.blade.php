<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    {{-- Outer ring --}}
    <circle cx="100" cy="100" r="95" fill="none" stroke="currentColor" stroke-width="6" opacity="0.3"/>
    {{-- Middle ring --}}
    <circle cx="100" cy="100" r="78" fill="none" stroke="currentColor" stroke-width="3" opacity="0.5"/>
    {{-- Weight plate left --}}
    <rect x="18" y="72" width="40" height="56" rx="8" fill="currentColor" opacity="0.15" stroke="currentColor" stroke-width="4"/>
    <rect x="24" y="76" width="28" height="48" rx="4" fill="none" stroke="currentColor" stroke-width="2" opacity="0.6"/>
    {{-- Weight plate right --}}
    <rect x="142" y="72" width="40" height="56" rx="8" fill="currentColor" opacity="0.15" stroke="currentColor" stroke-width="4"/>
    <rect x="148" y="76" width="28" height="48" rx="4" fill="none" stroke="currentColor" stroke-width="2" opacity="0.6"/>
    {{-- Barbell bar --}}
    <line x1="60" y1="100" x2="140" y2="100" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
    {{-- Center ring highlight --}}
    <circle cx="100" cy="100" r="18" fill="currentColor" opacity="0.2"/>
    {{-- "SW" in center --}}
    <text x="100" y="110" text-anchor="middle" font-family="system-ui, sans-serif" font-size="22" font-weight="900" fill="currentColor">SW</text>
    {{-- Base ring --}}
    <circle cx="100" cy="175" r="3" fill="currentColor" opacity="0.4"/>
</svg>
