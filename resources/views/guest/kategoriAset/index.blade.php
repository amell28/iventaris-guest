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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .btn-action {
            margin: 2px;
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
                        <h2>Data Kategori Aset</h2>
                        <p>Kelola kategori aset desa Bina Desa</p>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-lg-6">
                    <a href="{{ route('kategoriAset.create') }}" class="main-btn btn-hover">
                        <i class="lni lni-plus"></i> Tambah Kategori Aset
                    </a>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="lni lni-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Kategori</th>
                                            <th>Kode</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kategoriAset as $kategori)
                                        <tr>
                                            <td>{{ $kategori->kategori_id }}</td>
                                            <td>{{ $kategori->nama }}</td>
                                            <td><span class="badge bg-primary">{{ $kategori->kode }}</span></td>
                                            <td>{{ $kategori->deskripsi ? Str::limit($kategori->deskripsi, 50) : '-' }}</td>
                                            <td>{{ $kategori->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('kategoriAset.edit', $kategori->kategori_id) }}" class="btn btn-warning btn-sm btn-action" title="Edit">
                                                        <i class="lni lni-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('kategoriAset.destroy', $kategori->kategori_id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-action" title="Hapus" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                                            <i class="lni lni-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">
                                                <i class="lni lni-inbox" style="font-size: 48px;"></i>
                                                <p class="mt-2">Belum ada data kategori aset</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                             <li><a href="kategoriAset">Kategori</a></li>
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


    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets-guest/js/bootstrap-5.0.0-beta2.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    <script>
        // Auto-hide alert setelah 5 detik
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
</body>
</html>
