@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-12">
                {{-- Section Title --}}
                <div class="section-title text-center mb-50">
                    <h2>Formulir Edit Lokasi Aset</h2>
                    <p>Perbarui informasi lokasi untuk aset <strong>{{ $lokasiAset->aset->nama_aset }}</strong>.</p>
                </div>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-lg border-0 rounded-3">

                    {{-- Header --}}
                    <div class="card-header bg-primary text-white p-4 rounded-top-3">
                        <h4 class="card-title text-white mb-0">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            Edit Lokasi Aset: {{ $lokasiAset->aset->nama_aset }}
                        </h4>
                    </div>

                    <div class="card-body p-4 p-lg-5">

                        {{-- Error Message --}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i> Validasi Gagal!</h4>
                                <p>Periksa kembali kesalahan berikut:</p>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('lokasi-aset.update', $lokasiAset->lokasi_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- Kolom Kiri --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Informasi Lokasi</h5>

                                    {{-- Aset --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-box-seam me-2"></i>Pilih Aset</label>
                                        <select name="aset_id" class="form-select" required>
                                            <option value="">Pilih Aset</option>
                                            @foreach($aset as $a)
                                                <option value="{{ $a->aset_id }}"
                                                    {{ old('aset_id', $lokasiAset->aset_id) == $a->aset_id ? 'selected' : '' }}>
                                                    {{ $a->nama_aset }} ({{ $a->kode_aset }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Lokasi Text --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-geo me-2"></i>Deskripsi Lokasi</label>
                                        <input type="text" name="lokasi_text" class="form-control"
                                               value="{{ old('lokasi_text', $lokasiAset->lokasi_text) }}" required>
                                    </div>

                                    {{-- RT --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-hash me-2"></i>RT</label>
                                        <input type="number" name="rt" class="form-control"
                                               value="{{ old('rt', $lokasiAset->rt) }}" required>
                                    </div>
                                </div>

                                {{-- Kolom Kanan --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Detail Tambahan</h5>

                                    {{-- RW --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-hash me-2"></i>RW</label>
                                        <input type="number" name="rw" class="form-control"
                                               value="{{ old('rw', $lokasiAset->rw) }}" required>
                                    </div>

                                    {{-- Keterangan --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-info-circle-fill me-2"></i>Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan', $lokasiAset->keterangan) }}</textarea>
                                    </div>

                                    {{-- Media --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-image-fill me-2"></i>Foto Lokasi (Opsional)</label><br>

                                        @if($lokasiAset->media->first())
                                            <img src="{{ asset('storage/' . $lokasiAset->media->first()->file_name) }}"
                                                 class="rounded shadow mb-2" width="150">
                                        @endif

                                        <input type="file" name="media_file" class="form-control mt-2">
                                        <small class="text-muted">Upload foto baru jika ingin mengganti.</small>
                                    </div>
                                </div>

                            </div>

                            <hr class="mt-4">

                            {{-- Tombol Aksi --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('lokasi-aset.index') }}" class="main-btn border-btn me-3">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
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
