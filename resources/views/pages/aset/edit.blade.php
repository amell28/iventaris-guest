@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-12">
                {{-- Custom Section Title (mengikuti gaya warga.index) --}}
                <div class="section-title text-center mb-50">
                    <h2>Formulir Edit Aset</h2>
                    <p>Ubah data aset **{{ $aset->nama_aset }}** yang sudah ada.</p>
                </div>
            </div>
        </div>

        {{-- Main Card Container --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-lg border-0 rounded-3">
                    {{-- Header Card dengan Warna Primer --}}
                    <div class="card-header bg-primary text-white p-4 rounded-top-3">
                        <h4 class="card-title text-white mb-0">
                            <i class="bi bi-pencil-square me-2"></i> Detail Aset: {{ $aset->nama_aset }}
                        </h4>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        {{-- Area Pesan Error yang Lebih Informatif --}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i> Validasi Gagal!</h4>
                                <p>Terdapat beberapa kesalahan dalam pengisian formulir:</p>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('aset.update', $aset->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- Kolom Kiri: Data Identitas Aset --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Informasi Dasar Aset</h5>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-qr-code-scan me-2"></i>Kode Aset</label>
                                        <input type="text" name="kode_aset" class="form-control" value="{{ old('kode_aset', $aset->kode_aset) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-box-seam me-2"></i>Nama Aset</label>
                                        <input type="text" name="nama_aset" class="form-control" value="{{ old('nama_aset', $aset->nama_aset) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-tags-fill me-2"></i>Kategori</label>
                                        <select name="kategori_id" class="form-select" required>
                                            <option value="">Pilih Kategori</option>
                                            {{-- Variabel di controller Anda adalah $kategoris atau $kategoriAset --}}
                                            @foreach($kategoriAset ?? $kategoriAset as $kategori)
                                                <option value="{{ $kategori->kategori_id }}" {{ old('kategori_id', $aset->kategori_id) == $kategori->kategori_id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }} ({{ $kategori->kode }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-person-badge-fill me-2"></i>Penanggung Jawab</label>
                                        <input type="text" name="penanggung_jawab" class="form-control" value="{{ old('penanggung_jawab', $aset->penanggung_jawab) }}" required>
                                    </div>
                                </div>

                                {{-- Kolom Kanan: Data Finansial & Kondisi --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Detail Kondisi & Perolehan</h5>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-calendar-date-fill me-2"></i>Tanggal Perolehan</label>
                                        <input type="date" name="tanggal_perolehan" class="form-control" value="{{ old('tanggal_perolehan', \Carbon\Carbon::parse($aset->tanggal_perolehan)->format('Y-m-d')) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-currency-dollar me-2"></i>Nilai Perolehan (Rp)</label>
                                        <input type="number" name="nilai_perolehan" class="form-control" value="{{ old('nilai_perolehan', $aset->nilai_perolehan) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-activity me-2"></i>Kondisi</label>
                                        <select name="kondisi" class="form-select" required>
                                            <option value="Baik" {{ old('kondisi', $aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                            <option value="Rusak Ringan" {{ old('kondisi', $aset->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                            <option value="Rusak Berat" {{ old('kondisi', $aset->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-geo-alt-fill me-2"></i>Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $aset->lokasi) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-info-circle-fill me-2"></i>Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $aset->keterangan) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-4">

                            {{-- Tombol Aksi - Menggunakan kelas main-btn dan border-btn untuk konsistensi tema --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('aset.index') }}" class="main-btn border-btn me-3">
                                    <i class="bi bi-arrow-left me-1"></i> Batal
                                </a>
                                <button type="submit" class="main-btn btn-hover">
                                    <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
