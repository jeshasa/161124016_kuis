<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawais = [
            ['nama' => 'Budi Santoso', 'alamat' => 'Jl. Merdeka No. 10, Jakarta', 'telepon' => '081234567890'],
            ['nama' => 'Siti Rahma', 'alamat' => 'Jl. Mawar No. 45, Bandung', 'telepon' => '081298765432'],
            ['nama' => 'Ahmad Fauzi', 'alamat' => 'Jl. Sudirman No. 12, Surabaya', 'telepon' => '081377889900'],
        ];

        DB::table('pegawais')->insert($pegawais);
    }
}
