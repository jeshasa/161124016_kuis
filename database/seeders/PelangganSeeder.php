<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggans = [
            ['nama' => 'Andi Wijaya', 'alamat' => 'Jl. Kenanga No. 5, Jakarta', 'telepon' => '082111223344'],
            ['nama' => 'Dewi Lestari', 'alamat' => 'Jl. Melati No. 88, Yogyakarta', 'telepon' => '085612345678'],
            ['nama' => 'Rian Pratama', 'alamat' => 'Jl. Diponegoro No. 17, Semarang', 'telepon' => '087812349999'],
        ];

        DB::table('pelanggans')->insert($pelanggans);
    }
}
