<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Informasi | KnowMS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f8f9fa; }
        .container { max-width: 750px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 15px; }
        .text-danger { color: red; font-size: 13px; margin-top: 4px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-weight: bold; margin-bottom: 6px; color: #333; }
        input[type="text"], select, textarea { width: 100%; padding: 9px 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 14px; }
        input[type="text"]:focus, select:focus, textarea:focus { border-color: #80bdff; outline: none; }
        .btn { padding: 9px 18px; border-radius: 4px; font-size: 14px; text-decoration: none; display: inline-block; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; border: none; }
        .btn-secondary { background: #6c757d; color: white; border: none; margin-left: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ubah Informasi</h2>
        <p style="color: #666; font-size: 14px; margin-top: -10px;">Perbarui data artikel informasi yang telah tersimpan.</p>
        <hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">

        {{-- Pesan Gagal Session --}}
        @if (session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('informasi.update') }}">
            @method('PUT')
            @csrf

            <input type="hidden" name="id" value="{{ $informasi->id }}">

            <div class="form-group">
                <label for="judul">Judul Informasi <span style="color:red">*</span></label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $informasi->judul) }}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kategori_id">Kategori <span style="color:red">*</span></label>
                <select id="kategori_id" name="kategori_id">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $informasi->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ringkasan">Ringkasan Singkat <span style="color:red">*</span></label>
                <textarea id="ringkasan" name="ringkasan" rows="3">{{ old('ringkasan', $informasi->ringkasan) }}</textarea>
                @error('ringkasan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="isi">Isi Lengkap Informasi <span style="color:red">*</span></label>
                <textarea id="isi" name="isi" rows="6">{{ old('isi', $informasi->isi) }}</textarea>
                @error('isi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sumber">Sumber / Referensi</label>
                <input type="text" id="sumber" name="sumber" value="{{ old('sumber', $informasi->sumber) }}">
                @error('sumber')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status Publikasi <span style="color:red">*</span></label>
                <select id="status" name="status">
                    <option value="published" {{ old('status', $informasi->status) == 'published' ? 'selected' : '' }}>Published (Dapat dibaca oleh umum)</option>
                    <option value="draft" {{ old('status', $informasi->status) == 'draft' ? 'selected' : '' }}>Draft (Hanya tersimpan di panel admin)</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-top: 25px;">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('informasi.daftar') }}" class="btn btn-secondary">Batal / Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
