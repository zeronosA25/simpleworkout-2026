<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Link YouTube Rusak</title>
</head>
<body>
    <h2>Peringatan: Link YouTube Rusak Terdeteksi</h2>
    <p>Ditemukan <strong>{{ count($brokenLinks) }}</strong> link YouTube yang rusak:</p>
    <ul>
        @foreach ($brokenLinks as $link)
            <li>
                <strong>{{ $link['title'] }}</strong><br>
                URL: {{ $link['video_url'] }}<br>
                Status: {{ $link['status'] }}
            </li>
        @endforeach
    </ul>
    <hr>
    <p>Silakan login ke <a href="{{ filament()->getUrl() }}">Dashboard Admin</a> untuk memperbaiki link yang rusak.</p>
</body>
</html>
