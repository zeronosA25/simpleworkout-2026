<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pengingat Latihan</title>
</head>
<body style="font-family: system-ui, -apple-system, sans-serif; background: #f0f9ff; padding: 2rem 0; margin: 0;">
    <div style="max-width: 560px; margin: 0 auto; background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); overflow: hidden;">
        <div style="background: linear-gradient(135deg, #06b6d4, #3b82f6); padding: 2rem 2rem 1.5rem; text-align: center;">
            <h1 style="color: #fff; font-size: 1.5rem; margin: 0;">🔔 Pengingat Latihan</h1>
            <p style="color: #cffafe; margin: 0.5rem 0 0;">SimpleWorkout</p>
        </div>

        <div style="padding: 2rem;">
            <p style="font-size: 1.1rem; color: #374151; margin: 0 0 1rem;">
                Hai <strong>{{ $user->name }}</strong>! Jangan lupa latihan hari ini 💪
            </p>

            @foreach ($jadwalHariIni as $jp)
                @if($jp->hariJadwal)
                <div style="background: #f0f9ff; border: 1px solid #cffafe; border-radius: 12px; padding: 1rem 1.25rem; margin-bottom: 1rem;">
                    <h3 style="color: #0891b2; font-size: 1rem; margin: 0 0 0.75rem;">
                        📋 {{ $jp->hariJadwal->nama_hari }}
                    </h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach ($jp->hariJadwal->detailJadwal as $detail)
                            @if($detail->workout)
                            <li style="padding: 0.4rem 0; color: #4b5563; border-bottom: 1px dashed #e5e7eb; font-size: 0.95rem;">
                                {{ $loop->iteration }}. {{ $detail->workout->title }}
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif
            @endforeach

            <div style="text-align: center; margin: 2rem 0 1.5rem;">
                <a href="{{ route('schedules.index') }}"
                   style="display: inline-block; background: linear-gradient(135deg, #06b6d4, #3b82f6); color: #fff; padding: 0.85rem 2.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 1rem; box-shadow: 0 2px 4px rgba(6,182,212,0.3);">
                    📅 Buka Jadwal Saya
                </a>
            </div>

            <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 1.5rem 0;">

            <p style="color: #9ca3af; font-size: 0.85rem; text-align: center; margin: 0;">
                Email ini dikirim otomatis oleh SimpleWorkout.<br>
                Ada pertanyaan? <a href="mailto:{{ \App\Models\PengaturanWebsite::first()?->email_admin ?? 'admin@simpleworkout.test' }}" style="color: #06b6d4;">Hubungi Admin</a>
            </p>
        </div>
    </div>
</body>
</html>
