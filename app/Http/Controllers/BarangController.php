<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    /**
     * Menampilkan daftar semua barang
     */
    public function tampil()
    {
        // Menggunakan with('kategori') untuk Eager Loading agar query efisien
        $barangs = Barang::with('kategori')->get();
        return view('barang.daftar', compact('barangs'));
    }

    /**
     * Menampilkan formulir tambah barang
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    /**
     * Menyimpan data barang baru ke database
     */
    public function simpan(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
        ], [
            'nama.required' => 'Nama barang wajib diisi!',
            'harga.required' => 'Harga wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'stok.required' => 'Stok wajib diisi!',
            'stok.integer' => 'Stok harus berupa bilangan bulat!',
            'kategori_id.required' => 'Kategori wajib dipilih!',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid!',
        ]);

        try {
            Barang::create([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori_id' => $request->kategori_id,
            ]);

            return redirect('daftar-barang')->with('success', 'Barang berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan barang: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan formulir ubah data barang
     */
    public function ubah(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('barang.ubah', compact('barang', 'kategoris'));
    }

    /**
     * Memperbarui data barang di database
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:barangs,id'],
            'nama' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
        ], [
            'nama.required' => 'Nama barang wajib diisi!',
            'harga.required' => 'Harga wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'stok.required' => 'Stok wajib diisi!',
            'stok.integer' => 'Stok harus berupa bilangan bulat!',
            'kategori_id.required' => 'Kategori wajib dipilih!',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid!',
        ]);

        try {
            $barang = Barang::findOrFail($request->id);
            $barang->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori_id' => $request->kategori_id,
            ]);

            return redirect('daftar-barang')->with('success', 'Data barang berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui barang: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data barang dari database
     */
    public function hapus(Barang $barang)
    {
        try {
            $barang->delete();
            return redirect('daftar-barang')->with('success', 'Barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('daftar-barang')->with('error', 'Gagal menghapus barang: ' . $e->getMessage());
        }
    }

    public function publicMenu(){
        $barangs = Barang::with('kategori')->get();
        return view('barang.public_menu', compact('barangs'));
    }
}
