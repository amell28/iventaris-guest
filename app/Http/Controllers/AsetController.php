<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\kategoriAset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aset = Aset::with('kategoriAset')->latest()->get();
        return view('pages.aset.index', compact('aset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $kategoriAset = KategoriAset::all(); // Ambil semua kategori
        return view('pages.aset.create', compact('kategoriAset'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'kode_aset' => 'required|unique:aset,kode_aset',
            'nama_aset' => 'required',
            'kategori_id' => 'required|exists:kategori_aset,kategori_id',
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi' => 'required',
            'penanggung_jawab' => 'required'
        ]);

        Aset::create($request->all());

        return redirect()->route('aset.index')
            ->with('success', 'Data aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
         return view('aset.show', compact('aset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
         $kategoriAset = KategoriAset::all(); // Ambil semua kategori
        return view('pages.aset.edit', compact('aset', 'kategoriAset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
         $request->validate([
            'kode_aset' => 'required|unique:aset,kode_aset,' . $aset->id . ',id',
            'nama_aset' => 'required',
            'kategori_id' => 'required|exists:kategori_aset,kategori_id', // Validasi baru
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi' => 'required',
            'penanggung_jawab' => 'required'
        ]);

        $aset->update($request->all());
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
