<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu Makanan & Minuman | KnowMS</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f8f9fa; color: #333; }
        .navbar { background: #1a252f; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; color: white; }
        .navbar-brand { font-size: 20px; font-weight: bold; color: #fff; text-decoration: none; }
        .navbar-brand span { color: #e67e22; }
        .nav-links a { color: #ecf0f1; text-decoration: none; font-size: 14px; margin-left: 15px; }
        
        .header-title { text-align: center; padding: 40px 20px 20px; }
        .header-title h1 { margin: 0 0 8px; color: #2c3e50; font-size: 28px; }
        .header-title p { margin: 0; color: #7f8c8d; font-size: 15px; }

        .container { max-width: 1050px; margin: 20px auto 50px; padding: 0 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
        
        .card { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s; border-top: 4px solid #e67e22; }
        .card:hover { transform: translateY(-3px); box-shadow: 0 6px 15px rgba(0,0,0,0.1); }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; background: #fef5ec; color: #e67e22; margin-bottom: 10px; }
        .menu-title { font-size: 18px; font-weight: bold; color: #2c3e50; margin: 0 0 10px; }
        .price { font-size: 18px; font-weight: bold; color: #27ae60; margin: 15px 0 5px; }
        .stock { font-size: 13px; color: #888; }
        
        .btn-back { display: inline-block; background: #34495e; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-size: 14px; margin-bottom: 20px; }
        .btn-back:hover { background: #2c3e50; }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand">Know<span>MS</span> Kuliner</a>
        <div class="nav-links">
            <a href="{{ url('/') }}">&larr; Beranda Informasi</a>
            <a href="{{ url('daftar-barang') }}" style="background:#34495e; padding:6px 12px; border-radius:4px;">Kelola Menu (Admin)</a>
        </div>
    </div>

    <div class="container">
        <div class="header-title">
            <h1>🍽️ Daftar Menu Kuliner</h1>
            <p>Pilihan makanan berat, camilan ringan, dan aneka jus segar kami.</p>
        </div>

        <div class="grid">
            @forelse ($barangs as $barang)
                <div class="card">
                    <div>
                        <span class="badge">{{ $barang->kategori->nama_kategori ?? 'Umum' }}</span>
                        <div class="menu-title">{{ $barang->nama }}</div>
                    </div>
                    <div>
                        <div class="price">Rp {{ number_format($barang->harga, 0, ',', '.') }}</div>
                        <div class="stock">Tersedia: <strong>{{ $barang->stok }} porsi</strong></div>
                    </div>
                </div>
            @empty
                <p style="text-align: center; grid-column: 1 / -1; color: #888;">Belum ada menu yang tersedia.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
