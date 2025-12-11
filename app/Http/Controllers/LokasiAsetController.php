<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\LokasiAset;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LokasiAsetController extends Controller
{
    public function index()
    {
        $lokasiAset = LokasiAset::with(['aset', 'media'])
            ->latest('lokasi_id')
            ->paginate(10);

        return view('pages.lokasi-aset.index', compact('lokasiAset'));
    }

    public function create()
    {
        $aset = Aset::all();
        return view('pages.lokasi-aset.create', compact('aset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id'     => 'required|exists:aset,aset_id',
            'lokasi_text' => 'required|string|max:255',
            'rt'          => 'required|numeric',
            'rw'          => 'required|numeric',
            'keterangan'  => 'nullable|string',
            'media_file'  => 'nullable|image|max:4096',
        ]);

        // Simpan lokasi
        $lokasi = LokasiAset::create([
            'aset_id'     => $request->aset_id,
            'lokasi_text' => $request->lokasi_text,
            'rt'          => $request->rt,
            'rw'          => $request->rw,
            'keterangan'  => $request->keterangan,
        ]);

        // Upload Foto Lokasi → Media
        if ($request->hasFile('media_file')) {

            $path = $request->file('media_file')->store('lokasi_aset', 'public');

            Media::create([
                'ref_table' => 'lokasi_aset',
                'ref_id'    => $lokasi->lokasi_id,
                'file_name'  => $path,
                'caption'   => 'Foto Lokasi',
                'mime_type' => $request->file('media_file')->getClientMimeType(),
                'sort_order'=> 1,
            ]);
        }

        return redirect()->route('lokasi-aset.index')
            ->with('success', 'Lokasi aset berhasil ditambahkan!');
    }

    public function edit(LokasiAset $lokasiAset)
    {
        $aset = Aset::all();
        $media = $lokasiAset->media->first(); // ambil foto jika ada

        return view('pages.lokasi-aset.edit', compact('lokasiAset', 'aset', 'media'));
    }

    public function update(Request $request, LokasiAset $lokasiAset)
    {
        $request->validate([
            'aset_id'     => 'required|exists:aset,aset_id',
            'lokasi_text' => 'required|string|max:255',
            'rt'          => 'required|numeric',
            'rw'          => 'required|numeric',
            'keterangan'  => 'nullable|string',
            'media_file'  => 'nullable|image|max:4096',
        ]);

        // Update data lokasi
        $lokasiAset->update([
            'aset_id'     => $request->aset_id,
            'lokasi_text' => $request->lokasi_text,
            'rt'          => $request->rt,
            'rw'          => $request->rw,
            'keterangan'  => $request->keterangan,
        ]);

        // Jika ada foto baru
        if ($request->hasFile('media_file')) {

            // cek apakah ada foto lama
            $oldMedia = Media::where('ref_table', 'lokasi_aset')
                ->where('ref_id', $lokasiAset->lokasi_id)
                ->first();

            // hapus foto lama dari storage
            if ($oldMedia && Storage::disk('public')->exists($oldMedia->file_name)) {
                Storage::disk('public')->delete($oldMedia->file_name);
            }

            // upload foto baru
            $path = $request->file('media_file')->store('lokasi_aset', 'public');

            Media::updateOrCreate(
                [
                    'ref_table' => 'lokasi_aset',
                    'ref_id'    => $lokasiAset->lokasi_id,
                ],
                [
                    'file_name'  => $path,
                    'caption'   => 'Foto Lokasi',
                    'mime_type' => $request->file('media_file')->getClientMimeType(),
                    'sort_order'=> 1,
                ]
            );
        }

        return redirect()->route('lokasi-aset.index')
            ->with('success', 'Lokasi aset berhasil diperbarui!');
    }

    public function destroy(LokasiAset $lokasiAset)
    {
        // Hapus media
        $medias = Media::where('ref_table', 'lokasi_aset')
            ->where('ref_id', $lokasiAset->lokasi_id)
            ->get();

        foreach ($medias as $media) {
            if (Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
            }
            $media->delete();
        }

        // Hapus lokasi aset
        $lokasiAset->delete();

        return redirect()->route('lokasi-aset.index')
            ->with('success', 'Lokasi aset berhasil dihapus!');
    }
}
