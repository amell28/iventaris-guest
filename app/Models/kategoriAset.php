<?php
// app/Models/KategoriAset.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAset extends Model
{
    use HasFactory;

    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama', 'kode', 'deskripsi'];

    protected $table = 'kategori_aset';

    // Relasi dengan aset (jika nanti ada tabel aset)
    public function asets()
    {
        return $this->hasMany(Aset::class, 'kategori_id', 'kategori_id');
    }
}
