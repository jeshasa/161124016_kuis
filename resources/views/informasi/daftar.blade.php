<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Informasi | KnowMS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f8f9fa; }
        .container { max-width: 1100px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 20px; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 15px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 15px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-size: 14px; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #fcfcfc; }
        tr:hover { background-color: #f1f7ff; }
        .btn { padding: 7px 14px; text-decoration: none; border-radius: 4px; display: inline-block; font-size: 14px; }
        .btn-primary { background: #007bff; color: white; border: none; }
        .btn-success { background: #28a745; color: white; border: none; }
        .btn-secondary { background: #6c757d; color: white; border: none; }
        .badge { padding: 4px 8px; border-radius: 12px; font-size: 12px; font-weight: bold; }
        .badge-published { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .badge-draft { background: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
        .badge-kategori { background: #e2e3e5; color: #383d41; }
        .action-link { text-decoration: none; font-weight: bold; margin-right: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h2 style="margin:0; color:#333;">Kelola Informasi (Knowledge Hub)</h2>
                <small style="color:#666;">Panel Pengelolaan Konten Pengetahuan</small>
            </div>
            <div style="display: flex; gap: 10px; align-items: center;">
                <a href="{{ url('/') }}" class="btn btn-success">&larr; Ke Beranda Publik</a>
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display:inline; margin:0;">
                        @csrf
                        <button type="submit" class="btn" style="background:#dc3545; color:white; border:none; cursor:pointer;">Logout ({{ Auth::user()->name }})</button>
                    </form>
                @endauth
            </div>
        </div>

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan Error --}}
        @if (session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <p>
            <a href="{{ route('informasi.create') }}" class="btn btn-primary">+ Tambah Informasi Baru</a>
            <a href="{{ url('daftar-kategori') }}" class="btn btn-secondary" style="margin-left: 5px;">Kelola Kategori</a>
            <a href="{{ url('daftar-barang') }}" class="btn btn-secondary" style="margin-left: 5px;">Kelola Menu Barang</a>
        </p>

        <table>
            <thead>
                <tr>
                    <th style="width: 50px; text-align: center;">No</th>
                    <th>Judul Informasi</th>
                    <th>Kategori</th>
                    <th>Ringkasan</th>
                    <th>Sumber</th>
                    <th style="text-align: center;">Status</th>
                    <th style="width: 140px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($informasis as $index => $item)
                    <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td><strong>{{ $item->judul }}</strong></td>
                        <td>
                            <span class="badge badge-kategori">
                                {{ $item->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td>{{ Str::limit($item->ringkasan, 80) }}</td>
                        <td><small>{{ $item->sumber ?? '-' }}</small></td>
                        <td style="text-align: center;">
                            @if ($item->status == 'published')
                                <span class="badge badge-published">Published</span>
                            @else
                                <span class="badge badge-draft">Draft</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('informasi.ubah', $item) }}" class="action-link" style="color: #007bff;">[Ubah]</a>
                            <form action="{{ route('informasi.hapus', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?');">
                                @method('DELETE')
                                @csrf 
                                <button type="submit" style="color: red; background: none; border: none; cursor: pointer; font-weight: bold; font-size: 14px;">[Hapus]</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 25px; color: #888;">
                            Belum ada informasi yang ditambahkan. Silakan klik tombol "+ Tambah Informasi Baru".
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
