<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pegawai | KnowMS</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .login-card { background: white; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); width: 100%; max-width: 420px; padding: 35px 30px; }
        .login-header { text-align: center; margin-bottom: 25px; }
        .login-header h2 { margin: 0 0 6px; color: #1a252f; font-size: 24px; }
        .login-header p { margin: 0; color: #7f8c8d; font-size: 14px; }
        
        .alert-success { background-color: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px; font-size: 13px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 20px; font-size: 13px; }
        
        .form-group { margin-bottom: 18px; }
        label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 14px; color: #333; }
        input[type="email"], input[type="password"] { width: 100%; padding: 11px 14px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; transition: border-color 0.2s; }
        input[type="email"]:focus, input[type="password"]:focus { border-color: #3498db; outline: none; box-shadow: 0 0 0 3px rgba(52,152,219,0.15); }
        .text-danger { color: #e74c3c; font-size: 12px; margin-top: 5px; }
        
        .btn-submit { width: 100%; background: #3498db; color: white; border: none; padding: 12px; border-radius: 6px; font-size: 15px; font-weight: bold; cursor: pointer; transition: background 0.2s; margin-top: 10px; }
        .btn-submit:hover { background: #2980b9; }
        
        .demo-box { background: #e8f4fc; border: 1px dashed #3498db; border-radius: 6px; padding: 12px 15px; margin-top: 25px; font-size: 13px; color: #2c3e50; }
        .demo-box strong { display: block; margin-bottom: 4px; color: #2980b9; }
        
        .back-link { text-align: center; margin-top: 20px; font-size: 13px; }
        .back-link a { color: #7f8c8d; text-decoration: none; }
        .back-link a:hover { color: #333; text-decoration: underline; }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h2>🔑 Login Pegawai</h2>
            <p>Masukkan kredensial akun kasir / staf Anda</p>
        </div>

        {{-- Pesan Sukses (misal baru logout) --}}
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

        <form method="POST" action="{{ route('login.proses') }}">
            @csrf

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', 'pegawai@gmail.com') }}" placeholder="nama@toko.com" required autofocus>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi (Password)</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">Masuk ke Sistem &rarr;</button>
        </form>

        {{-- Info Akun Demo untuk Dosen / Penguji --}}
        <div class="demo-box">
            <strong>Akun Demo Pegawai:</strong>
            Email: <code>pegawai@gmail.com</code><br>
            Password: <code>123456</code>
        </div>

        <div class="back-link">
            <a href="{{ url('/') }}">&larr; Kembali ke Beranda Publik</a>
        </div>
    </div>

</body>
</html>
