<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota_id',
        'barang_id',
        'jumlah',
        'harga_satuan',
        'subtotal',
    ];

    public function nota()
    {
        return $this->belongsTo(Nota::class, 'nota_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
