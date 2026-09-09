<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Hub Mini | KnowMS</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f4f6f9; color: #333; }
        .navbar { background: #1a252f; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; color: white; }
        .navbar-brand { font-size: 20px; font-weight: bold; color: #fff; text-decoration: none; }
        .navbar-brand span { color: #3498db; }
        .nav-link { color: #ecf0f1; text-decoration: none; font-size: 14px; padding: 6px 14px; border-radius: 4px; background: #34495e; transition: 0.2s; }
        .nav-link:hover { background: #3498db; }
        
        .hero { background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); color: white; padding: 45px 20px; text-align: center; }
        .hero h1 { margin: 0 0 10px; font-size: 32px; }
        .hero p { margin: 0 0 25px; font-size: 16px; opacity: 0.9; }
        
        .search-box { max-width: 550px; margin: auto; display: flex; }
        .search-box input { flex: 1; padding: 12px 18px; border: none; border-radius: 25px 0 0 25px; font-size: 15px; outline: none; }
        .search-box button { background: #2ecc71; color: white; border: none; padding: 12px 24px; border-radius: 0 25px 25px 0; cursor: pointer; font-size: 15px; font-weight: bold; }
        .search-box button:hover { background: #27ae60; }
        
        .container { max-width: 1050px; margin: 35px auto; padding: 0 20px; }
        .section-title { font-size: 20px; margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 8px; display: inline-block; }
        
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(310px, 1fr)); gap: 20px; }
        .card { background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 20px; display: flex; flex-direction: column; transition: transform 0.2s, box-shadow 0.2s; }
        .card:hover { transform: translateY(-3px); box-shadow: 0 6px 15px rgba(0,0,0,0.1); }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
        .badge-kategori { background: #e8f4fc; color: #2980b9; font-size: 12px; font-weight: bold; padding: 4px 10px; border-radius: 12px; }
        .date { font-size: 12px; color: #888; }
        .card-title { font-size: 18px; font-weight: bold; margin: 0 0 10px; color: #2c3e50; line-height: 1.4; }
        .card-text { font-size: 14px; color: #666; line-height: 1.5; flex: 1; margin-bottom: 15px; }
        .card-footer { border-top: 1px solid #f1f1f1; padding-top: 12px; display: flex; justify-content: space-between; align-items: center; }
        .source { font-size: 12px; color: #95a5a6; }
        .btn-read { color: #3498db; text-decoration: none; font-size: 14px; font-weight: bold; }
        .btn-read:hover { text-decoration: underline; }
        
        .empty-state { text-align: center; padding: 50px 20px; background: white; border-radius: 8px; color: #7f8c8d; }
    </style>
</head>
<body>

    <!-- Navigasi -->
    <div class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand">Know<span>MS</span> Hub</a>
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="{{ route('menu.public') }}" class="nav-link" style="background: #e67e22; font-weight: bold;">🍽️ Lihat Daftar Menu</a>
            @auth
                <a href="{{ route('informasi.daftar') }}" class="nav-link">&larr; Panel Admin (CRUD)</a>
                <span style="font-size: 13px; color: #f1c40f;">👤 {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline; margin:0;">
                    @csrf
                    <button type="submit" style="background:#e74c3c; color:white; border:none; padding:6px 12px; border-radius:4px; cursor:pointer; font-size:13px; font-weight:bold;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link" style="background: #27ae60; font-weight: bold;">🔑 Login Pegawai</a>
            @endauth
        </div>
    </div>

    <!-- Hero / Header Pencarian (Bonus Fitur Search) -->
    <div class="hero">
        <h1>Pusat Pengetahuan & Informasi</h1>
        <p>Temukan panduan, dokumentasi, dan wawasan resmi terlengkap di sini.</p>
        <form action="{{ url('/') }}" method="GET">
            <div class="search-box">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul informasi atau kata kunci...">
                <button type="submit">Cari</button>
            </div>
        </form>
    </div>

    <!-- Konten Utama: Daftar Informasi Published -->
    <div class="container">
        @if(request('cari'))
            <p style="margin-bottom: 20px; font-size: 14px;">
                Menampilkan hasil pencarian untuk: <strong>"{{ request('cari') }}"</strong> 
                — <a href="{{ url('/') }}" style="color: #e74c3c; text-decoration: none;">Reset Pencarian</a>
            </p>
        @endif

        <div class="section-title">Informasi & Pengetahuan Terpublikasi</div>

        <div class="grid">
            @forelse ($informasis as $item)
                <div class="card">
                    <div class="card-header">
                        <span class="badge-kategori">{{ $item->kategori->nama_kategori ?? 'Umum' }}</span>
                        <span class="date">{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                    </div>
                    <div class="card-title">{{ $item->judul }}</div>
                    <div class="card-text">{{ $item->ringkasan }}</div>
                    <div class="card-footer">
                        <span class="source">Ref: {{ Str::limit($item->sumber ?? 'Internal', 25) }}</span>
                        <a href="{{ route('informasi.detail', $item->id) }}" class="btn-read">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            @empty
                <div class="empty-state" style="grid-column: 1 / -1;">
                    <h3>Tidak ada informasi ditemukan</h3>
                    <p>Belum ada informasi publik yang sesuai dengan kata kunci pencarian Anda.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
