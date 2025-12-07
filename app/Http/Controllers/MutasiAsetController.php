<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Aset;
use Illuminate\Http\Request;

class MutasiAsetController extends Controller
{
    public function index()
    {
        $mutasi = MutasiAset::with('aset')
            ->latest('mutasi_id')
            ->paginate(10);

        return view('pages.mutasi.index', compact('mutasi'));
    }

    public function create()
    {
        $aset = Aset::all();
        return view('pages.mutasi.create', compact('aset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id'      => 'required|exists:aset,aset_id',
            'tanggal'      => 'required|date',
            'jenis_mutasi' => 'required',
            'keterangan'   => 'nullable|string',
        ]);

        MutasiAset::create($request->all());

        return redirect()->route('mutasi.index')
            ->with('success', 'Data mutasi aset berhasil ditambahkan.');
    }

    public function edit(MutasiAset $mutasi)
    {
        $aset = Aset::all();
        return view('pages.mutasi.edit', compact('mutasi', 'aset'));
    }

    public function update(Request $request, MutasiAset $mutasi)
    {
        $request->validate([
            'aset_id'      => 'required|exists:aset,aset_id',
            'tanggal'      => 'required|date',
            'jenis_mutasi' => 'required',
            'keterangan'   => 'nullable|string',
        ]);

        $mutasi->update($request->all());

        return redirect()->route('mutasi.index')
            ->with('success', 'Data mutasi berhasil diperbarui.');
    }

    public function destroy(MutasiAset $mutasi)
    {
        $mutasi->delete();

        return redirect()->route('mutasi.index')
            ->with('success', 'Data mutasi berhasil dihapus.');
    }
}
