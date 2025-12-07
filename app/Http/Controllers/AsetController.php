<?php
namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\Media;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        $aset = Aset::with(['kategoriAset', 'media'])
            ->latest('aset_id')
            ->paginate(6);

        return view('pages.aset.index', compact('aset'));
    }

    public function create()
    {
        $kategoriAset = KategoriAset::all();
        return view('pages.aset.create', compact('kategoriAset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_aset'         => 'required|unique:aset,kode_aset',
            'nama_aset'         => 'required',
            'kategori_id'       => 'required|exists:kategori_aset,kategori_id',
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan'   => 'required|numeric',
            'kondisi'           => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi'            => 'required',
            'penanggung_jawab'  => 'required',
            'media_file'        => 'nullable|image|max:2048',
        ]);

        // ⬅️ SIMPAN DATA ASET DAN GET ASSET ID
        $aset = Aset::create([
            'kode_aset'         => $request->kode_aset,
            'nama_aset'         => $request->nama_aset,
            'kategori_id'       => $request->kategori_id,
            'tanggal_perolehan' => $request->tanggal_perolehan,
            'nilai_perolehan'   => $request->nilai_perolehan,
            'kondisi'           => $request->kondisi,
            'lokasi'            => $request->lokasi,
            'penanggung_jawab'  => $request->penanggung_jawab,
            'keterangan'        => $request->keterangan,
        ]);

        // ========== SIMPAN FOTO ==========
        if ($request->hasFile('media_file')) {
            $path = $request->file('media_file')->store('aset', 'public');

            Media::create([
                'ref_table'  => 'aset',
                'ref_id'     => $aset->aset_id, // ← sekarang TIDAK ERROR
                'file_url'   => $path,
                'caption'    => 'Foto Aset',
                'mime_type'  => $request->file('media_file')->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('aset.index')
            ->with('success', 'Data aset berhasil ditambahkan!');
    }

    public function edit(Aset $aset)
    {
        $kategoriAset = KategoriAset::all();
        return view('pages.aset.edit', compact('aset', 'kategoriAset'));
    }

    public function update(Request $request, Aset $aset)
    {
        $request->validate([
            'kode_aset'         => 'required|unique:aset,kode_aset,' . $aset->aset_id . ',aset_id',
            'nama_aset'         => 'required',
            'kategori_id'       => 'required|exists:kategori_aset,kategori_id',
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan'   => 'required|numeric',
            'kondisi'           => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi'            => 'required',
            'penanggung_jawab'  => 'required',
            'media_file'        => 'nullable|image|max:2048',
        ]);

        $aset->update([
            'kode_aset'         => $request->kode_aset,
            'nama_aset'         => $request->nama_aset,
            'kategori_id'       => $request->kategori_id,
            'tanggal_perolehan' => $request->tanggal_perolehan,
            'nilai_perolehan'   => $request->nilai_perolehan,
            'kondisi'           => $request->kondisi,
            'lokasi'            => $request->lokasi,
            'penanggung_jawab'  => $request->penanggung_jawab,
            'keterangan'        => $request->keterangan,
        ]);

        // ========== UPDATE FOTO ==========
        if ($request->hasFile('media_file')) {
            $path = $request->file('media_file')->store('aset', 'public');

            Media::updateOrCreate(
                [
                    'ref_table' => 'aset',
                    'ref_id'    => $aset->aset_id,
                ],
                [
                    'file_url'   => $path,
                    'caption'    => 'Foto Aset',
                    'mime_type'  => $request->file('media_file')->getMimeType(),
                    'sort_order' => 1,
                ]
            );
        }

        return redirect()->route('aset.index')
            ->with('success', 'Data aset berhasil diperbarui!');
    }

    public function destroy(Aset $aset)
    {
        Media::where('ref_table', 'aset')
            ->where('ref_id', $aset->aset_id)
            ->delete();

        $aset->delete();

        return redirect()->route('aset.index')
            ->with('success', 'Data aset berhasil dihapus!');
    }
}
