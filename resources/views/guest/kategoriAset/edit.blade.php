<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Edit Kategori Aset - Bina Desa</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets-guest/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap-5.0.0-beta2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-guest/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-guest/css/main.css') }}" />

    <style>
        .container-custom {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card-form {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
        }
    </style>
</head>

<body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- ========================= header start ========================= -->
    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('dashboard') }}">
                                <p>Bina Desa</p>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <div class="navbar-nav ms-auto py-0">
                                    <a href="{{ url('/dashboard') }}" class="nav-item nav-link active">Home</a>
                                    <a href="{{ route('warga.index') }}" class="nav-item nav-link">Data Warga</a>
                                    <a href="{{ route('kategoriAset.index') }}" class="nav-item nav-link">Kategori Aset</a>

                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========================= header end ========================= -->

    <!-- Main Content -->
    <section class="pt-120 pb-80">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Edit Kategori Aset</h2>
                        <p>Ubah data kategori aset yang dipilih</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card card-form">
                        <div class="card-body p-5">
                            <form action="{{ route('kategoriAset.update', $kategoriAset->kategori_id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="nama" class="form-label fw-bold">Nama Kategori</label>
                                    <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                           id="nama" name="nama" value="{{ old('nama', $kategoriAset->nama) }}"
                                           placeholder="Masukkan nama kategori" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="kode" class="form-label fw-bold">Kode Unik</label>
                                    <input type="text" class="form-control form-control-lg @error('kode') is-invalid @enderror"
                                           id="kode" name="kode" value="{{ old('kode', $kategoriAset->kode) }}"
                                           placeholder="Masukkan kode unik" required>
                                    @error('kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                              id="deskripsi" name="deskripsi" rows="4"
                                              placeholder="Masukkan deskripsi kategori">{{ old('deskripsi', $kategoriAset->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                    <a href="{{ route('kategoriAset.index') }}" class="btn btn-secondary btn-lg me-md-3">
                                        <i class="lni lni-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="lni lni-save"></i> Update Kategori
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets-guest/js/bootstrap-5.0.0-beta2.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
</body>
</html>
