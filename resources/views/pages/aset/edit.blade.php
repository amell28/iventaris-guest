@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>Edit Aset</h2>
                    <p>Ubah data aset <b>{{ $aset->nama_aset }}</b></p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">

                <div class="card shadow-lg border-0 rounded-3">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white p-4 rounded-top-3">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-pencil-square me-2"></i> Edit Aset: {{ $aset->nama_aset }}
                        </h4>
                    </div>

                    <div class="card-body p-4 p-lg-5">

                        {{-- ERROR --}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Validasi gagal:</strong>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- FORM EDIT --}}
                        <form action="{{ route('aset.update', $aset->aset_id) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- KOLOM KIRI --}}
                                <div class="col-md-6">
                                    <h5 class="text-primary border-bottom pb-2">Informasi Dasar</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Kode Aset</label>
                                        <input type="text" name="kode_aset" class="form-control"
                                               value="{{ old('kode_aset', $aset->kode_aset) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Aset</label>
                                        <input type="text" name="nama_aset" class="form-control"
                                               value="{{ old('nama_aset', $aset->nama_aset) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select name="kategori_id" class="form-select" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach($kategoriAset as $kategori)
                                                <option value="{{ $kategori->kategori_id }}"
                                                    {{ $aset->kategori_id == $kategori->kategori_id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }} ({{ $kategori->kode }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Penanggung Jawab</label>
                                        <input type="text" name="penanggung_jawab" class="form-control"
                                               value="{{ old('penanggung_jawab', $aset->penanggung_jawab) }}" required>
                                    </div>

                                </div>

                                {{-- KOLOM KANAN --}}
                                <div class="col-md-6">
                                    <h5 class="text-primary border-bottom pb-2">Detail Perolehan</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Perolehan</label>
                                        <input type="date" name="tanggal_perolehan" class="form-control"
                                               value="{{ old('tanggal_perolehan', $aset->tanggal_perolehan) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nilai Perolehan (Rp)</label>
                                        <input type="number" name="nilai_perolehan" class="form-control"
                                               value="{{ old('nilai_perolehan', $aset->nilai_perolehan) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kondisi</label>
                                        <select name="kondisi" class="form-select" required>
                                            <option value="Baik" {{ $aset->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                            <option value="Rusak Ringan" {{ $aset->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                            <option value="Rusak Berat" {{ $aset->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control"
                                               value="{{ old('lokasi', $aset->lokasi) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="3">
                                            {{ old('keterangan', $aset->keterangan) }}
                                        </textarea>
                                    </div>
                                </div>

                            </div>

                            {{-- FOTO ASET --}}
                            <hr class="mt-4">
                            <h5 class="text-primary border-bottom pb-2">Foto Aset</h5>

                            <div class="mb-3">

                                {{-- FOTO LAMA --}}
                                @php
                                    $foto = $aset->media->first();
                                @endphp

                                @if($foto)
                                    <p>Foto Lama:</p>
                                    <img src="{{ asset('storage/' . $foto->file_url) }}"
                                         style="height:150px; border-radius:10px; object-fit:cover;">
                                @else
                                    <p class="text-muted">Belum ada foto.</p>
                                @endif

                                {{-- INPUT FOTO BARU --}}
                                <label class="form-label mt-3">Upload Foto Baru (Opsional)</label>
                                <input type="file" name="media_file" class="form-control" accept="image/*">

                                {{-- Preview Foto Baru --}}
                                <img id="previewImg" class="mt-3 d-none"
                                     style="height:150px; border-radius:10px; object-fit:cover;">
                            </div>

                            {{-- SCRIPT PREVIEW --}}
                            <script>
                                document.querySelector('input[name="media_file"]').addEventListener('change', function(e) {
                                    let img = document.getElementById('previewImg');
                                    img.src = URL.createObjectURL(e.target.files[0]);
                                    img.classList.remove('d-none');
                                });
                            </script>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('aset.index') }}" class="main-btn border-btn me-3">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>

                                <button type="submit" class="main-btn btn-hover">
                                    <i class="bi bi-check-circle"></i> Simpan Perubahan
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
