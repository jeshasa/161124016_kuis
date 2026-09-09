<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Kategori;

class InformasiController extends Controller
{
    public function publicIndex(Request $request){
        $query = Informasi::with('kategori')
        ->where('status','published');

        if ($request->has('cari')&& $request->cari !=''){
            $cari = $request->cari;
            $query->where(function($q) use($cari) {
                 $q->where('judul', 'like', "%{$cari}%")
                  ->orWhere('ringkasan', 'like', "%{$cari}%");
            });
        }
        $informasis = $query->latest()->get();
        return view('informasi.public_index', compact('informasis'));
    }

    public function publicDetail($id)
    {
        // Cari informasi yang statusnya published
        $informasi = Informasi::with('kategori')->where('status', 'published')->findOrFail($id);
        return view('informasi.public_detail', compact('informasi'));
    }

    public function tampil()
    {
        $informasis = Informasi::with('kategori')->latest()->get();
        return view('informasi.daftar', compact('informasis'));
    }

     public function create()
    {
        $kategoris = Kategori::all();
        return view('informasi.create', compact('kategoris'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul'       => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'ringkasan'   => ['required', 'string'],
            'isi'         => ['required', 'string'],
            'sumber'      => ['nullable', 'string', 'max:255'],
            'status'      => ['required', 'in:draft,published'],
        ], [
            'judul.required'       => 'Judul informasi wajib diisi!',
            'kategori_id.required' => 'Kategori wajib dipilih!',
            'kategori_id.exists'   => 'Kategori tidak valid!',
            'ringkasan.required'   => 'Ringkasan wajib diisi!',
            'isi.required'         => 'Isi informasi wajib diisi!',
            'status.required'      => 'Status publikasi wajib dipilih!',
        ]);
        try {
            Informasi::create([
                'judul'       => $request->judul,
                'kategori_id' => $request->kategori_id,
                'ringkasan'   => $request->ringkasan,
                'isi'         => $request->isi,
                'sumber'      => $request->sumber,
                'status'      => $request->status,
            ]);
            return redirect('daftar-informasi')->with('success', 'Informasi baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan informasi: ' . $e->getMessage());
        }
    }

    public function ubah(Informasi $informasi)
    {
        $kategoris = Kategori::all();
        return view('informasi.ubah', compact('informasi', 'kategoris'));
    }
     public function update(Request $request)
    {
        $request->validate([
            'id'          => ['required', 'exists:informasis,id'],
            'judul'       => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'ringkasan'   => ['required', 'string'],
            'isi'         => ['required', 'string'],
            'sumber'      => ['nullable', 'string', 'max:255'],
            'status'      => ['required', 'in:draft,published'],
        ]);
        try {
            $informasi = Informasi::findOrFail($request->id);
            $informasi->update([
                'judul'       => $request->judul,
                'kategori_id' => $request->kategori_id,
                'ringkasan'   => $request->ringkasan,
                'isi'         => $request->isi,
                'sumber'      => $request->sumber,
                'status'      => $request->status,
            ]);
            return redirect('daftar-informasi')->with('success', 'Informasi berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui informasi: ' . $e->getMessage());
        }
    }
    /**
     * Menghapus data informasi (Method DELETE)
     */
    public function hapus(Informasi $informasi)
    {
        try {
            $informasi->delete();
            return redirect('daftar-informasi')->with('success', 'Informasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('daftar-informasi')->with('error', 'Gagal menghapus informasi: ' . $e->getMessage());
        }
    }
}
