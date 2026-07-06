<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Halaman Tidak Ditemukan</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ecfeff, #ffffff, #ecfdf5);
            color: #1f2937;
        }
        .container { text-align: center; padding: 2rem; }
        .code {
            font-size: clamp(5rem, 15vw, 10rem);
            font-weight: 800;
            background: linear-gradient(to right, #06b6d4, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }
        h1 { font-size: 1.5rem; margin-bottom: 0.5rem; }
        p { color: #6b7280; margin-bottom: 2rem; max-width: 28rem; margin-left: auto; margin-right: auto; }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(to right, #06b6d4, #3b82f6);
            color: #fff;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
        }
        .btn:hover { filter: brightness(1.05); }
        svg { width: 1.25rem; height: 1.25rem; }
    </style>
</head>
<body>
<div class="container">
    <div class="code">404</div>
    <h1>Halaman Tidak Ditemukan</h1>
    <p>Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
    <a href="/" class="btn">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        Kembali ke Beranda
    </a>
</div>
</body>
</html>
