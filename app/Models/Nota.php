<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_nota',
        'tanggal',
        'pegawai_id',
        'pelanggan_id',
        'total_harga',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    public function notaBarangs()
    {
        return $this->hasMany(NotaBarang::class, 'nota_id');
    }
}
