<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nota;
use App\Models\NotaBarang;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Barang;

class NotaSeeder extends Seeder
{
    public function run(): void
    {

        NotaBarang::query()->delete();
        Nota::query()->delete();

        $pegawai   = Pegawai::first();
        $pelanggan = Pelanggan::first();
        $barang1   = Barang::first();                
        $barang2   = Barang::skip(1)->first() ?? $barang1;

        if (!$pegawai || !$pelanggan || !$barang1) {
            $this->command->warn('Pastikan seeder Pegawai, Pelanggan, dan Barang sudah dijalankan lebih dulu!');
            return;
        }

        $nota1 = Nota::create([
            'nomor_nota'   => 'NOTA-001',
            'tanggal'      => now()->toDateString(),
            'pegawai_id'   => $pegawai->id,
            'pelanggan_id' => $pelanggan->id,
            'total_harga'  => 0, 
        ]);

        $subtotal1 = 2 * $barang1->harga;
        NotaBarang::create([
            'nota_id'      => $nota1->id,
            'barang_id'    => $barang1->id,
            'jumlah'       => 2,
            'harga_satuan' => $barang1->harga,
            'subtotal'     => $subtotal1,
        ]);

        $subtotal2 = 1 * $barang2->harga;
        NotaBarang::create([
            'nota_id'      => $nota1->id,
            'barang_id'    => $barang2->id,
            'jumlah'       => 1,
            'harga_satuan' => $barang2->harga,
            'subtotal'     => $subtotal2,
        ]);

        $nota1->update([
            'total_harga' => $subtotal1 + $subtotal2,
        ]);

        $pelanggan2 = Pelanggan::skip(1)->first() ?? $pelanggan;

        $nota2 = Nota::create([
            'nomor_nota'   => 'NOTA-002',
            'tanggal'      => now()->subDay()->toDateString(), // Transaksi kemarin
            'pegawai_id'   => $pegawai->id,
            'pelanggan_id' => $pelanggan2->id,
            'total_harga'  => 0,
        ]);

        $subtotalNota2 = 3 * $barang1->harga;
        NotaBarang::create([
            'nota_id'      => $nota2->id,
            'barang_id'    => $barang1->id,
            'jumlah'       => 3,
            'harga_satuan' => $barang1->harga,
            'subtotal'     => $subtotalNota2,
        ]);

        $nota2->update([
            'total_harga' => $subtotalNota2,
        ]);
    }
}
