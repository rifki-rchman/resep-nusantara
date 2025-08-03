<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id', // Pastikan ada
    'kategori_id',
    'judul',
    'deskripsi',
    'bahan',
    'langkah',
    'gambar',
    'durasi',
    'user_id',
    'porsi'
];

public function user()
{
    return $this->belongsTo(User::class);
}
public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

}