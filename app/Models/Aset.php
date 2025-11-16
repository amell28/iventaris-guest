<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aset extends Model
{
     use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'aset'; // Pastikan ini 'aset'

    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'kategori_id',      // <-- PERBAIKAN 1: Ganti 'kategori' menjadi 'kategori_id'
        'tanggal_perolehan',
        'nilai_perolehan',  // <-- PERBAIKAN 2: Pastikan ini ada (sudah ada di file Anda)
        'kondisi',
        'lokasi',
        'penanggung_jawab',
        'keterangan'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'tanggal_perolehan' => 'date',
        'nilai_perolehan' => 'decimal:2'
    ];

    /**
     * Relasi ke model KategoriAset
     */
    public function kategoriAset()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id', 'kategori_id');
    }
}
