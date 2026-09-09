<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Kategori;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data barang lama jika ada
        Barang::query()->delete();

        // Ambil ID kategori berdasarkan data yang sudah ada di database kamu
        $katMakananBerat  = Kategori::where('nama_kategori', 'like', '%Makanan Berat%')->first()->id ?? 1;
        $katMakananRingan = Kategori::where('nama_kategori', 'like', '%Makanan Ringan%')->first()->id ?? 2;
        $katJus           = Kategori::where('nama_kategori', 'like', '%Jus%')->first()->id ?? 3;

        $daftarBarang = [
            // 1. Makanan Berat
            ['nama' => 'Nasi Goreng Spesial', 'harga' => 15000, 'stok' => 20, 'kategori_id' => $katMakananBerat],
            ['nama' => 'Ayam Goreng Lengkuas', 'harga' => 22000, 'stok' => 15, 'kategori_id' => $katMakananBerat],
            ['nama' => 'Bakso Sapi Urat', 'harga' => 18000, 'stok' => 25, 'kategori_id' => $katMakananBerat],
            ['nama' => 'Mie Ayam Jamur', 'harga' => 16000, 'stok' => 18, 'kategori_id' => $katMakananBerat],
            ['nama' => 'Mie Goreng Seafood', 'harga' => 20000, 'stok' => 12, 'kategori_id' => $katMakananBerat],

            // 2. Makanan Ringan
            ['nama' => 'Keripik Singkong Balado', 'harga' => 8000, 'stok' => 30, 'kategori_id' => $katMakananRingan],
            ['nama' => 'Kentang Goreng Crispy', 'harga' => 12000, 'stok' => 25, 'kategori_id' => $katMakananRingan],
            ['nama' => 'Roti Bakar Cokelat Keju', 'harga' => 14000, 'stok' => 15, 'kategori_id' => $katMakananRingan],
            ['nama' => 'Cireng Crispy Bumbu Rujak', 'harga' => 10000, 'stok' => 20, 'kategori_id' => $katMakananRingan],

            // 3. Jus
            ['nama' => 'Jus Mangga Manalagi', 'harga' => 12000, 'stok' => 20, 'kategori_id' => $katJus],
            ['nama' => 'Jus Apel Segar', 'harga' => 13000, 'stok' => 18, 'kategori_id' => $katJus],
            ['nama' => 'Jus Alpukat Kocok', 'harga' => 15000, 'stok' => 15, 'kategori_id' => $katJus],
            ['nama' => 'Jus Jeruk Peras Dingin', 'harga' => 10000, 'stok' => 22, 'kategori_id' => $katJus],
        ];

        foreach ($daftarBarang as $barang) {
            Barang::create($barang);
        }
    }
}
