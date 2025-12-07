@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">

        {{-- HEADER --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>Edit Pemeliharaan Aset</h2>
                    <p>Perbarui data pemeliharaan aset berikut.</p>
                </div>
            </div>
        </div>

        {{-- MAIN CARD --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-lg border-0 rounded-3">

                    {{-- CARD HEADER --}}
                    <div class="card-header bg-warning text-white p-4 rounded-top-3">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-tools me-2"></i> Edit Pemeliharaan {{ $pemeliharaan->aset->nama_aset }}
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
                        <form action="{{ route('pemeliharaan.update', $pemeliharaan->pemeliharaan_id) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- LEFT COLUMN --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Informasi Pemeliharaan</h5>

                                    {{-- ASET --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-box me-2"></i>Pilih Aset</label>
                                        <select name="aset_id" class="form-select" required>
                                            @foreach($aset as $a)
                                                <option value="{{ $a->aset_id }}"
                                                    {{ $pemeliharaan->aset_id == $a->aset_id ? 'selected' : '' }}>
                                                    {{ $a->nama_aset }} ({{ $a->kode_aset }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- TANGGAL --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-calendar-check me-2"></i>Tanggal Pemeliharaan</label>
                                        <input type="date" name="tanggal" class="form-control"
                                               value="{{ old('tanggal', $pemeliharaan->tanggal) }}" required>
                                    </div>

                                    {{-- TINDAKAN --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-clipboard-check me-2"></i>Tindakan</label>
                                        <textarea name="tindakan" class="form-control" rows="3" required>{{ old('tindakan', $pemeliharaan->tindakan) }}</textarea>
                                    </div>

                                </div>

                                {{-- RIGHT COLUMN --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Detail Biaya & Bukti</h5>

                                    {{-- BIAYA --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-cash-stack me-2"></i>Biaya (Rp)</label>
                                        <input type="number" name="biaya" class="form-control"
                                               value="{{ old('biaya', $pemeliharaan->biaya) }}" required>
                                    </div>

                                    {{-- PELAKSANA --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-person-fill me-2"></i>Pelaksana</label>
                                        <input type="text" name="pelaksana" class="form-control"
                                               value="{{ old('pelaksana', $pemeliharaan->pelaksana) }}" required>
                                    </div>

                                    {{-- FOTO / BUKTI --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-image me-2"></i>Upload Bukti Foto (Opsional)</label>
                                        <input type="file" name="media_file" class="form-control" accept="image/*">

                                        @php $media = $pemeliharaan->media->first(); @endphp

                                        @if ($media)
                                            <img src="{{ asset('storage/'.$media->file_url) }}"
                                                 class="img-thumbnail mt-2"
                                                 style="height:150px; width:100%; object-fit:cover; border-radius:10px;">
                                        @endif

                                        <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengganti foto.</small>
                                    </div>

                                </div>
                            </div>

                            <hr class="mt-4">

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('pemeliharaan.index') }}" class="main-btn border-btn me-3">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                </a>
                                <button class="main-btn btn-hover">
                                    <i class="bi bi-check-circle me-1"></i> Update Pemeliharaan
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
