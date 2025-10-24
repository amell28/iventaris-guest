<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Kategori Aset - Bina Desa</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets-guest/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap-5.0.0-beta2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-guest/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-guest/css/main.css') }}" />

    <style>
        .container-custom {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        .kategori-card {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            margin-bottom: 25px;
            height: 100%;
            background: white;
        }
        .kategori-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .kategori-header {
            padding: 25px 25px 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        .kategori-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 15px;
        }
        .kategori-badge {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .kategori-content {
            padding: 20px 25px;
        }
        .kategori-footer {
            padding: 15px 25px;
            border-top: 1px solid #f0f0f0;
            background: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            margin-bottom: 25px;
        }
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .stats-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 15px 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
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
                                    <a href="{{ url('/dashboard') }}" class="nav-item nav-link">Home</a>
                                    <a href="{{ route('warga.index') }}" class="nav-item nav-link">Data Warga</a>
                                    <a href="{{ route('kategoriAset.index') }}" class="nav-item nav-link active">Kategori Aset</a>
                                </div>
                            </div>
                            <div class="header-btn">
                                <a href="{{ route('kategoriAset.create') }}" class="main-btn btn-hover">
                                    <i class="lni lni-plus"></i> Tambah Kategori
                                </a>
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
                        <h2>Kategori Aset Desa</h2>
                        <p>Kelola kategori aset dengan tampilan yang modern</p>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Statistics -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="stats-number">{{ $kategoriAset->count() }}</div>
                        <div class="stats-label">Total Kategori</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stats-number">{{ $kategoriAset->where('deskripsi', '!=', '')->count() }}</div>
                        <div class="stats-label">Kategori dengan Deskripsi</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stats-number">{{ $kategoriAset->count() }}</div>
                        <div class="stats-label">Total Kode Unik</div>
                    </div>
                </div>
            </div>

            <!-- Search Box -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="search-box">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari Kategori Aset</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Ketik nama kategori atau kode..." id="searchInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori Cards -->
            <div class="row" id="kategoriContainer">
                @forelse($kategoriAset as $kategori)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-4 kategori-item">
                    <div class="card kategori-card">
                        <div class="kategori-header text-center">
                            <div class="kategori-icon mx-auto">
                                <i class="lni lni-layers"></i>
                            </div>
                            <h4 class="mb-2">{{ $kategori->nama }}</h4>
                            <span class="kategori-badge">{{ $kategori->kode }}</span>
                        </div>

                        <div class="kategori-content">
                            <div class="mb-3">
                                <small class="text-muted">Deskripsi:</small>
                                <p class="mb-0">{{ $kategori->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                            </div>

                            <div class="row text-center">
                                <div class="col-6">
                                    <small class="text-muted">Dibuat</small>
                                    <p class="mb-0 fw-bold">{{ $kategori->created_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Diupdate</small>
                                    <p class="mb-0 fw-bold">{{ $kategori->updated_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="kategori-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('kategoriAset.edit', $kategori->kategori_id) }}"
                                       class="btn btn-warning btn-sm w-100" title="Edit">
                                        <i class="lni lni-pencil"></i>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('kategoriAset.destroy', $kategori->kategori_id) }}"
                                          method="POST" class="d-inline w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100"
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            <i class="lni lni-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card text-center py-5">
                        <div class="card-body">
                            <i class="lni lni-inbox display-1 text-muted mb-3"></i>
                            <h4 class="text-muted">Belum ada data kategori aset</h4>
                            <p class="text-muted">Mulai dengan menambahkan kategori pertama</p>
                            <a href="{{ route('kategoriAset.create') }}" class="main-btn btn-hover">
                                <i class="lni lni-plus"></i> Tambah Kategori Pertama
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ========================= footer start ========================= -->
    <footer class="footer pt-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
                    <div class="footer-widget">
                        <div class="logo">
                            <a href="{{ route('dashboard') }}"> <img src="{{asset('assets-guest/images/logo/logo.svg') }}" alt="logo"> </a>
                        </div>
                        <p class="desc">Sistem pengelolaan data warga yang mudah dan efisien.</p>
                        <ul class="social-links">
                            <li><a href="#0"><i class="lni lni-facebook"></i></a></li>
                            <li><a href="#0"><i class="lni lni-linkedin"></i></a></li>
                            <li><a href="#0"><i class="lni lni-instagram"></i></a></li>
                            <li><a href="#0"><i class="lni lni-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 offset-xl-1">
                    <div class="footer-widget">
                        <h3>Menu</h3>
                        <ul class="links">
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li><a href="{{ route('warga.index') }}">Data Warga</a></li>
                            <li><a href="{{ route('kategoriAset.index') }}">Kategori Aset</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h3>Fitur</h3>
                        <ul class="links">
                            <li><a href="{{ route('warga.index') }}">Lihat Data</a></li>
                            <li><a href="{{ route('warga.create') }}">Tambah Data</a></li>
                            <li><a href="{{ route('kategoriAset.index') }}">Lihat Kategori</a></li>
                            <li><a href="{{ route('kategoriAset.create') }}">Tambah Kategori</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ========================= footer end ========================= -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets-guest/js/bootstrap-5.0.0-beta2.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const kategoriItems = document.querySelectorAll('.kategori-item');

            kategoriItems.forEach(item => {
                const nama = item.querySelector('h4').textContent.toLowerCase();
                const kode = item.querySelector('.kategori-badge').textContent.toLowerCase();

                if (nama.includes(searchTerm) || kode.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Auto-hide alert
        setTimeout(function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        }, 5000);
    </script>
</body>
</html>
