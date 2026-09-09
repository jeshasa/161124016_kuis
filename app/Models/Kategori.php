<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    /**
     * Relasi ke Barang (Satu kategori bisa memiliki banyak barang)
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }

    public function informasis()
    {
        return $this->hasMany(Informasi::class, 'kategori_id');
    }
}
