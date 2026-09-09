<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; display: inline-block; }
        .btn-primary { background: #007bff; color: white; }
    </style>
</head>
<body>
    <h2>Daftar Barang</h2>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan Error / Gagal --}}
    @if (session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <p>
        <a href="{{ url('tambah-barang') }}" class="btn btn-primary">+ Tambah Barang</a>
        <a href="{{ url('daftar-kategori') }}" class="btn" style="background: #6c757d; color: white; margin-left: 5px;">Kelola Kategori</a>
        <a href="{{ route('informasi.daftar') }}" class="btn" style="background: #17a2b8; color: white; margin-left: 5px;">Kelola Informasi</a>
        <a href="{{ url('/') }}" class="btn" style="background: #28a745; color: white; margin-left: 5px;">&larr; Ke Halaman Utama (Publik)</a>
        <a href="{{ route('menu.public') }}" class="btn" style="background: #e67e22; color: white; margin-left: 5px;">🍽️ Lihat Menu Publik</a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @forelse ($barangs as $barang)
            <tr>
                <td>{{ $barang->id }}</td>
                <td>{{ $barang->nama }}</td>
                <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->kategori->nama_kategori ?? 'Tanpa Kategori' }}</td>
                <td>
                    <a href="{{ route('barang.ubah', $barang) }}">[UBAH]</a>
                    <form action="{{ route('barang.hapus', $barang) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                        @method('DELETE')
                        @csrf 
                        <input type="submit" value="[HAPUS]" style="color:red; background:none; border:none; cursor:pointer; text-decoration:underline;">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada data barang.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>