<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .text-danger { color: red; font-size: 13px; }
        table tr td { padding: 6px; }
    </style>
</head>
<body>
    <h2>Ubah Kategori</h2>

    {{-- Pesan Gagal / Error Session --}}
    @if (session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Pesan Error Validasi Keseluruhan --}}
    @if ($errors->any())
        <div class="alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ url('update-kategori') }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $kategori->id }}">
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td>
                    <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
                    @error('nama_kategori')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                    <textarea name="deskripsi">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Simpan Perubahan">
                    <a href="{{ url('daftar-kategori') }}">Kembali</a>
                </td>
            </tr>
        </table>
    </form> 
</body>
</html>