<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function tampil(){
        // $kategoris = DB::table('kategoris')->get();
        $kategoris = Kategori::all();
        return view('kategori.daftar', ['kategoris' => $kategoris]);
    }

    public function create(){
        return view('kategori.create');
    }

    public function simpan(Request $request){
        $request->validate([
            'nama_kategori' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'deskripsi' => ['nullable', 'string'],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi!',
            'nama_kategori.regex' => 'Nama kategori tidak boleh mengandung angka atau simbol!',
        ]);

        try {
            $kategori = new Kategori;
            $kategori->nama_kategori = $request->get('nama_kategori');
            $kategori->deskripsi = $request->get('deskripsi');
            $kategori->save();

            return redirect('daftar-kategori')->with('success', 'Kategori berhasil disimpan!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan kategori: ' . $e->getMessage());
        }
    }

    public function hapus(Kategori $kategori){
        try {
            $kategori->delete();
            return redirect('daftar-kategori')->with('success', 'Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('daftar-kategori')->with('error', 'Gagal menghapus kategori: Masih ada barang yang terkait dengan kategori ini.');
        }
    }

    public function ubah(Kategori $kategori){
        return view('kategori.ubah', ['kategori' => $kategori]);
    }

    public function update(Request $request) {
        $request->validate([
            'id' => ['required', 'exists:kategoris,id'],
            'nama_kategori' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'deskripsi' => ['nullable', 'string'],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi!',
            'nama_kategori.regex' => 'Nama kategori tidak boleh mengandung angka atau simbol!',
        ]);

        try {
            $kategori = Kategori::findOrFail($request->get('id'));
            $kategori->nama_kategori = $request->get('nama_kategori');
            $kategori->deskripsi = $request->get('deskripsi');
            $kategori->save();

            return redirect('daftar-kategori')->with('success', 'Kategori berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui kategori: ' . $e->getMessage());
        }
    }
}
