<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $informasi->judul }} | KnowMS</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f4f6f9; color: #333; }
        .navbar { background: #1a252f; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; color: white; }
        .navbar-brand { font-size: 20px; font-weight: bold; color: #fff; text-decoration: none; }
        .navbar-brand span { color: #3498db; }
        .nav-link { color: #ecf0f1; text-decoration: none; font-size: 14px; }
        
        .container { max-width: 850px; margin: 40px auto; padding: 0 20px; }
        .card { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); padding: 35px 40px; }
        
        .badge-kategori { background: #e8f4fc; color: #2980b9; font-size: 13px; font-weight: bold; padding: 5px 12px; border-radius: 12px; display: inline-block; margin-bottom: 12px; }
        h1 { font-size: 28px; color: #2c3e50; margin: 0 0 15px; line-height: 1.3; }
        .meta { color: #7f8c8d; font-size: 13px; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        
        .ringkasan-box { background: #f8f9fa; border-left: 4px solid #3498db; padding: 15px 20px; font-style: italic; color: #555; margin-bottom: 30px; line-height: 1.6; }
        
        .content { font-size: 16px; line-height: 1.8; color: #34495e; margin-bottom: 35px; white-space: pre-line; }
        
        .source-box { background: #eef2f5; padding: 12px 18px; border-radius: 6px; font-size: 13px; color: #555; margin-bottom: 30px; }
        
        .btn-back { display: inline-block; background: #34495e; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn-back:hover { background: #2c3e50; }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand">Know<span>MS</span> Hub</a>
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="{{ route('menu.public') }}" class="nav-link" style="background: #e67e22; font-weight: bold;">🍽️ Lihat Daftar Menu</a>
            <a href="{{ url('/') }}" class="nav-link">&larr; Kembali ke Beranda</a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <span class="badge-kategori">{{ $informasi->kategori->nama_kategori ?? 'Umum' }}</span>
            <h1>{{ $informasi->judul }}</h1>

            <div class="meta">
                Dipublikasikan: <strong>{{ $informasi->created_at ? $informasi->created_at->format('d F Y, H:i') : '-' }} WIB</strong> 
                &bull; Kategori: <strong>{{ $informasi->kategori->nama_kategori ?? 'Umum' }}</strong>
            </div>

            <div class="ringkasan-box">
                <strong>Ringkasan:</strong><br>
                {{ $informasi->ringkasan }}
            </div>

            <div class="content">
                {{ $informasi->isi }}
            </div>

            @if($informasi->sumber)
                <div class="source-box">
                    <strong>Sumber / Referensi:</strong> {{ $informasi->sumber }}
                </div>
            @endif

            <div style="border-top: 1px solid #eee; padding-top: 20px; margin-top: 20px;">
                <a href="{{ url('/') }}" class="btn-back">&larr; Kembali ke Beranda Knowledge Hub</a>
            </div>
        </div>
    </div>

</body>
</html>
