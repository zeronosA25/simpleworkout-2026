<div>
    @if ($hasDuplicates)
        <div class="fi-wi-stats-overview-stats-ctn rounded-xl bg-warning-50 p-4 shadow-sm ring-1 ring-warning-200">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-warning-100">
                    <x-heroicon-o-exclamation-triangle class="h-5 w-5 text-warning-600" />
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-warning-800">
                        Permintaan Gerakan Berulang
                    </h3>
                    <p class="text-xs text-warning-600">
                        Terdeteksi 3+ permintaan gerakan yang sama dalam 1 minggu
                    </p>
                </div>
            </div>
            <ul class="mt-3 space-y-2">
                @foreach ($duplicates as $dup)
                    <li class="rounded-lg bg-white p-2 text-sm shadow-sm ring-1 ring-warning-300">
                        <span class="font-medium">"{{ \Illuminate\Support\Str::limit($dup['text'], 80) }}"</span>
                        <span class="ml-2 rounded-full bg-warning-200 px-2 py-0.5 text-xs font-semibold text-warning-800">
                            {{ $dup['count'] }}x
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
