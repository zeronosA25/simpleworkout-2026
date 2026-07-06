<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 - Kesalahan Server</title>
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
            background: linear-gradient(to right, #ef4444, #f97316);
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
    <div class="code">500</div>
    <h1>Kesalahan Server</h1>
    <p>Terjadi kesalahan pada server. Silakan coba beberapa saat lagi atau hubungi admin.</p>
    <a href="/" class="btn">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        Coba Lagi
    </a>
</div>
</body>
</html>
