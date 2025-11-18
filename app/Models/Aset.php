<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
        'kategori_id', // <-- PERBAIKAN 1: Ganti 'kategori' menjadi 'kategori_id'
        'tanggal_perolehan',
        'nilai_perolehan', // <-- PERBAIKAN 2: Pastikan ini ada (sudah ada di file Anda)
        'kondisi',
        'lokasi',
        'penanggung_jawab',
        'keterangan',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'tanggal_perolehan' => 'date',
        'nilai_perolehan'   => 'decimal:2',
    ];

    /**
     * Relasi ke model KategoriAset
     */
    public function kategoriAset()
    {
        return $this->belongsTo(kategoriAset::class, 'kategori_id', 'kategori_id');
    }

    public function scopeFilter(Builder $query, $request, array $filterableColumns = [])
    {
        // Filter berdasarkan kondisi
        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        // Search berdasarkan kode_aset atau nama_aset
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kode_aset', 'like', '%' . $search . '%')
                  ->orWhere('nama_aset', 'like', '%' . $search . '%');
            });
        }
        return $query;
    }
}
