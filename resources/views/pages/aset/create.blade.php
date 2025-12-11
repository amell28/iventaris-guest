@extends('layouts.guest.app')

@section('content')
<!-- Start Main Content: Formulir Tambah Aset -->
<section class="pt-120 pb-80">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>Formulir Tambah Aset</h2>
                    <p>Masukkan data aset baru ke dalam sistem inventaris desa.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-lg border-0 rounded-3">

                    <div class="card-header bg-primary text-white p-4 rounded-top-3">
                        <h4 class="card-title text-white mb-0">
                            <i class="bi bi-box-fill me-2"></i> Input Data Aset Baru
                        </h4>
                    </div>

                    <div class="card-body p-4 p-lg-5">

                        {{-- ERROR MESSAGE --}}
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <h4 class="alert-heading">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Validasi Gagal!
                                </h4>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- FORM MULAI --}}
                        <form action="{{ route('aset.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                {{-- KOLOM KIRI --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Informasi Dasar Aset</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Kode Aset</label>
                                        <input type="text" name="kode_aset" class="form-control"
                                               value="{{ old('kode_aset') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Aset</label>
                                        <input type="text" name="nama_aset" class="form-control"
                                               value="{{ old('nama_aset') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select name="kategori_id" class="form-select" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach($kategoriAset as $kategori)
                                                <option value="{{ $kategori->kategori_id }}"
                                                    {{ old('kategori_id') == $kategori->kategori_id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }} ({{ $kategori->kode }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                {{-- KOLOM KANAN --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Detail Kondisi & Perolehan</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Perolehan</label>
                                        <input type="date" name="tgl_perolehan" class="form-control"
                                               value="{{ old('tgl_perolehan') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nilai Perolehan (Rp)</label>
                                        <input type="number" name="nilai_perolehan" class="form-control"
                                               value="{{ old('nilai_perolehan') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kondisi</label>
                                        <select name="kondisi" class="form-select" required>
                                            <option value="">Pilih Kondisi</option>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak Ringan">Rusak Ringan</option>
                                            <option value="Rusak Berat">Rusak Berat</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            {{-- UPLOAD FOTO --}}
                            <hr class="mt-4">
                            <h5 class="mb-3 text-primary border-bottom pb-2">Foto Aset</h5>

                            <div class="mb-3">
                                <label class="form-label">Upload Foto (Opsional)</label>
                                <input type="file" name="media_file" class="form-control" accept="image/*">

                                {{-- Preview sebelum upload --}}
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
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('aset.index') }}" class="main-btn border-btn me-3">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="main-btn btn-hover">
                                    <i class="bi bi-save me-1"></i> Simpan Aset
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
