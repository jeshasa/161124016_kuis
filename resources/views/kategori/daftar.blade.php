<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
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
    <h2>Daftar Kategori</h2>

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
        <a href="{{ url('tambah-kategori') }}" class="btn btn-primary">+ Tambah Kategori</a>
        <a href="{{ url('daftar-barang') }}" class="btn" style="background: #6c757d; color: white; margin-left: 5px;">Ke Daftar Barang &rarr;</a>
        <a href="{{ route('informasi.daftar') }}" class="btn" style="background: #17a2b8; color: white; margin-left: 5px;">Kelola Informasi</a>
        <a href="{{ url('/') }}" class="btn" style="background: #28a745; color: white; margin-left: 5px;">&larr; Ke Halaman Utama (Publik)</a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        @forelse ($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->deskripsi }}</td>
                <td>
                    <a href="{{ route('kategori.ubah', $kategori) }}">[UBAH]</a>
                    <form action="{{ route('kategori.hapus', $kategori) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                        @method('DELETE')
                        @csrf 
                        <input type="hidden" name="id" value="{{ $kategori->id }}">
                        <input type="submit" value="[HAPUS]" style="color:red; background:none; border:none; cursor:pointer; text-decoration:underline;">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align: center;">Belum ada data kategori.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>