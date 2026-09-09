<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .text-danger { color: red; font-size: 13px; }
        table tr td { padding: 6px; }
    </style>
</head>
<body>
    <h2>Tambah Barang</h2>

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

    <form method="post" action="{{ url('simpan-barang') }}">
        @csrf
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>
                    <input type="text" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="number" step="any" name="harga" value="{{ old('harga') }}">
                    @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>
                    <input type="number" name="stok" value="{{ old('stok', 0) }}">
                    @error('stok')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Simpan">
                    <a href="{{ url('daftar-barang') }}">Kembali</a>
                </td>
            </tr>
        </table>
    </form> 
</body>
</html>