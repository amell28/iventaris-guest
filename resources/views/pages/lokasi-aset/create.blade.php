@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">

        {{-- HEADER --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>Formulir Tambah Lokasi Aset</h2>
                    <p>Masukkan informasi lokasi untuk aset yang telah terdaftar.</p>
                </div>
            </div>
        </div>

        {{-- MAIN CARD --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-lg border-0 rounded-3">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-primary text-white p-4 rounded-top-3">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-geo-alt-fill me-2"></i> Input Lokasi Aset
                        </h4>
                    </div>

                    <div class="card-body p-4 p-lg-5">

                        {{-- ERROR MESSAGE --}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <h4 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i> Validasi Gagal!</h4>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- FORM --}}
                        <form action="{{ route('lokasi-aset.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Informasi Lokasi</h5>

                                    {{-- ASET --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-box me-2"></i>Pilih Aset</label>
                                        <select name="aset_id" class="form-select" required>
                                            <option value="">-- Pilih Aset --</option>
                                            @foreach($aset as $a)
                                                <option value="{{ $a->aset_id }}" {{ old('aset_id') == $a->aset_id ? 'selected' : '' }}>
                                                    {{ $a->nama_aset }} ({{ $a->kode_aset }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- LOKASI TEXT --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-geo me-2"></i>Lokasi (Deskripsi)</label>
                                        <input type="text" name="lokasi_text" class="form-control"
                                               value="{{ old('lokasi_text') }}" required>
                                    </div>

                                    {{-- KETERANGAN --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-card-text me-2"></i>Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
                                    </div>

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Detail Lokasi</h5>

                                    {{-- RT --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-house-door me-2"></i>RT</label>
                                        <input type="number" name="rt" class="form-control"
                                               value="{{ old('rt') }}" required>
                                    </div>

                                    {{-- RW --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-house-door-fill me-2"></i>RW</label>
                                        <input type="number" name="rw" class="form-control"
                                               value="{{ old('rw') }}" required>
                                    </div>

                                    {{-- FOTO / DENAH --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-image me-2"></i>Upload Foto / Denah Lokasi</label>
                                        <input type="file" name="media_file" class="form-control" accept="image/*">
                                        <small class="text-muted">Opsional — max size 2MB</small>
                                    </div>

                                </div>
                            </div>

                            <hr class="mt-4">

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('lokasi-aset.index') }}" class="main-btn border-btn me-3">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                </a>
                                <button class="main-btn btn-hover">
                                    <i class="bi bi-save me-1"></i> Simpan Lokasi
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
