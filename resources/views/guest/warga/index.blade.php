<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Data Warga - Bina Desa</title>
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
        .warga-card {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            margin-bottom: 25px;
            height: 100%;
        }
        .warga-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .warga-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }
        .warga-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 15px;
        }
        .warga-info {
            padding: 20px;
        }
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-icon {
            width: 30px;
            color: #667eea;
            font-size: 1.1rem;
        }
        .info-content {
            flex: 1;
        }
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .action-buttons {
            border-top: 1px solid #f0f0f0;
            padding: 15px 20px;
            background: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 15px 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
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
                                    <a href="{{ route('warga.index') }}" class="nav-item nav-link active">Data Warga</a>
                                    <a href="{{ route('kategoriAset.index') }}" class="nav-item nav-link">Kategori Aset</a>
                                </div>
                            </div>
                            <div class="header-btn">
                                <a href="{{ route('warga.create') }}" class="main-btn btn-hover">
                                    <i class="lni lni-plus"></i> Tambah Warga
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
                        <h2>Data Warga Desa</h2>
                        <p>Kelola data warga dengan tampilan yang lebih informatif</p>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Statistics Row -->
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">{{ $dataWarga->count() }}</div>
                        <div class="stats-label">Total Warga</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stats-number">{{ $dataWarga->where('jenis_kelamin', 'Laki-laki')->count() }}</div>
                        <div class="stats-label">Warga Laki-laki</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stats-number">{{ $dataWarga->where('jenis_kelamin', 'Perempuan')->count() }}</div>
                        <div class="stats-label">Warga Perempuan</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <div class="stats-number">{{ $dataWarga->where('pekerjaan', '!=', '')->count() }}</div>
                        <div class="stats-label">Memiliki Pekerjaan</div>
                    </div>
                </div>
            </div>

            <!-- Search Box -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="search-box">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari Data Warga</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Ketik nama atau NIK warga..." id="searchInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Warga Cards -->
            <div class="row" id="wargaContainer">
                @forelse ($dataWarga as $item)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-4 warga-item">
                    <div class="card warga-card">
                        <div class="warga-header text-center">
                            <div class="warga-avatar mx-auto">
                                <i class="lni lni-user"></i>
                            </div>
                            <h5 class="mb-1">{{ $item->nama }}</h5>
                            <p class="mb-0 opacity-75">NIK: {{ $item->no_ktp }}</p>
                        </div>

                        <div class="warga-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="lni lni-venus-mars"></i>
                                </div>
                                <div class="info-content">
                                    <strong>Jenis Kelamin</strong><br>
                                    {{ $item->jenis_kelamin }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="lni lni-heaven"></i>
                                </div>
                                <div class="info-content">
                                    <strong>Agama</strong><br>
                                    {{ $item->agama }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="lni lni-briefcase"></i>
                                </div>
                                <div class="info-content">
                                    <strong>Pekerjaan</strong><br>
                                    {{ $item->pekerjaan ?: 'Tidak bekerja' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="lni lni-phone"></i>
                                </div>
                                <div class="info-content">
                                    <strong>Telepon</strong><br>
                                    {{ $item->telp ?: '-' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="lni lni-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <strong>Email</strong><br>
                                    {{ $item->email ?: '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-warning btn-sm w-100">
                                        <i class="lni lni-pencil"></i> Edit
                                    </a>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="d-inline w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="lni lni-trash"></i> Hapus
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
                            <h4 class="text-muted">Belum ada data warga</h4>
                            <p class="text-muted">Mulai dengan menambahkan data warga pertama</p>
                            <a href="{{ route('warga.create') }}" class="main-btn btn-hover">
                                <i class="lni lni-plus"></i> Tambah Warga Pertama
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
            const wargaItems = document.querySelectorAll('.warga-item');

            wargaItems.forEach(item => {
                const nama = item.querySelector('h5').textContent.toLowerCase();
                const nik = item.querySelector('.warga-header p').textContent.toLowerCase();

                if (nama.includes(searchTerm) || nik.includes(searchTerm)) {
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
