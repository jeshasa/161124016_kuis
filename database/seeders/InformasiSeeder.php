<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;
use App\Models\Kategori;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data lama jika ada
        Informasi::query()->delete();

        // Cari kategori berdasarkan nama atau ambil kategori pertama
        $katMakananBerat = Kategori::where('nama_kategori', 'like', '%Makanan Berat%')->first() ?? Kategori::first();
        $katJus          = Kategori::where('nama_kategori', 'like', '%Jus%')->first() ?? $katMakananBerat;
        $katMakananRingan= Kategori::where('nama_kategori', 'like', '%Makanan Ringan%')->first() ?? $katMakananBerat;

        Informasi::create([
            'kategori_id' => $katMakananBerat->id,
            'judul' => 'Resep Rahasia Nasi Goreng Spesial Restoran',
            'ringkasan' => 'Panduan lengkap cara memasak nasi goreng lezat dengan aroma harum khas wok restoran.',
            'isi' => "Kunci utama dari nasi goreng yang lezat adalah menggunakan nasi pera yang sudah diinapkan semalam di lemari es. \n\nGunakan api besar saat menumis bumbu halus (bawang merah, bawang putih, dan cabai) serta tambahkan sedikit kecap ikan dan saus tiram di pinggir wajan agar tercipta aroma smokey yang sedap.",
            'sumber' => 'Dapur Kuliner Nusantara',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $katMakananBerat->id,
            'judul' => 'Tips Mengolah Daging Ayam Goreng Tetap Juicy dan Crispy',
            'ringkasan' => 'Teknik marinasi dan penggorengan agar daging ayam tidak kering saat disajikan.',
            'isi' => "Sebelum digoreng, lumuri ayam dengan perasan jeruk nipis dan garam, lalu marinasi minimal 30 menit dengan bawang putih halus, ketumbar, dan jahe. \n\nGoreng dengan metode deep-frying pada minyak bersuhu 170°C hingga berwarna kuning keemasan.",
            'sumber' => 'Chef Ragil Masterclass',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $katJus->id,
            'judul' => 'Khasiat Jus Mangga dan Apel untuk Kesehatan Tubuh',
            'ringkasan' => 'Mengenal berbagai vitamin dan manfaat antioksidan dalam jus buah segar.',
            'isi' => "Jus buah segar seperti mangga dan apel kaya akan vitamin C, vitamin A, dan serat larut. \n\nMengonsumsi segelas jus buah dingin tanpa tambahan gula pasir berlebih sangat efektif untuk menjaga daya tahan tubuh, melancarkan pencernaan, dan menyegarkan stamina setelah beraktivitas.",
            'sumber' => 'Jurnal Gizi dan Kesehatan',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $katMakananRingan->id,
            'judul' => 'Cara Menyimpan Stok Makanan Ringan Agar Tetap Renyah',
            'ringkasan' => 'Tips sederhana menjaga kerenyahan snack dan kerupuk dalam toples kedap udara.',
            'isi' => "Kelembapan udara adalah musuh utama kerenyahan camilan. Selalu simpan makanan ringan di dalam toples kedap udara dan letakkan di tempat yang sejuk serta terhindar dari paparan sinar matahari langsung.",
            'sumber' => 'Tips Dapur Harian',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $katMakananBerat->id,
            'judul' => 'Draf Eksperimen Menu Baru: Sup Buntut Bakar Madu',
            'ringkasan' => 'Catatan formulasi bumbu bakar madu untuk menu baru bulan depan.',
            'isi' => "Menu ini masih dalam tahap uji coba di dapur internal. Mengkombinasikan buntut sapi empuk dengan olesan madu dan kecap manis sebelum dibakar di atas arang batok kelapa.",
            'sumber' => 'Catatan Dapur Internal',
            'status' => 'draft', // DRAFT: Hanya tampil di Admin, tidak tampil di Publik!
        ]);
    }
}
