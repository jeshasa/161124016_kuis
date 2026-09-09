<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'judul',
        'ringkasan',
        'isi',
        'sumber',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
