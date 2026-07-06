<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Saran/Kritik Baru</title>
</head>
<body>
    <h2>Saran/Kritik Baru Masuk</h2>
    <p><strong>Pengirim:</strong> {{ $user?->name ?? 'Anonim' }} {{ $user ? '(' . $user->email . ')' : '' }}</p>
    <p><strong>Kategori:</strong> {{ $saranKritik->kategori }}</p>
    <p><strong>Pesan:</strong></p>
    <blockquote>{{ $saranKritik->pesan }}</blockquote>
    <p><strong>Waktu:</strong> {{ $saranKritik->created_at->format('d M Y, H:i') }} WIB</p>
    <hr>
    <p>Silakan login ke <a href="{{ filament()->getUrl() }}">Dashboard Admin</a> untuk menindaklanjuti.</p>
</body>
</html>
