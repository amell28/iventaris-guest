<!DOCTYPE html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Edit Data Warga</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
	<!-- Place favicon.ico in the root directory -->

	<!-- ========================= CSS here ========================= -->
	<link rel="stylesheet" href="{{asset('assets-guest/css/bootstrap-5.0.0-beta2.min.css') }}" />
	<link rel="stylesheet" href="{{asset('assets-guest/css/LineIcons.2.0.css') }}" />
	<link rel="stylesheet" href="{{asset('assets-guest/css/tiny-slider.css') }}" />
	<link rel="stylesheet" href="{{asset('assets-guest/css/animate.css') }}" />
	<link rel="stylesheet" href="{{asset('assets-guest/css/main.css') }}" />
</head>

<body>
	<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

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
							<a class="navbar-brand" href="{{ url('/') }}">
								<p> Bina Desa</p>
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
							<!-- navbar collapse -->
							<div class="header-btn">
								<a href="{{ route('warga.index') }}" class="main-btn btn-hover">Kembali</a>
							</div>
						</nav>
						<!-- navbar -->
					</div>
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- navbar area -->
	</header>
	<!-- ========================= header end ========================= -->

	<!-- ========================= form section start ========================= -->
	<section id="form-warga" class="cta-section pt-130 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title text-center mb-50">
						<h2 class="mb-20">Edit Data Warga</h2>
						<p class="mb-30">Ubah data warga sesuai dengan informasi terbaru</p>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card shadow-sm">
						<div class="card-body p-5">
							<form action="{{ route('warga.update', $dataWarga->warga_id) }}" method="POST">
								@method('PUT')
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="no_ktp" class="form-label">No KTP *</label>
											<input type="text" id="no_ktp" name="no_ktp" class="form-control" value="{{ $dataWarga->no_ktp }}" required>
										</div>

										<div class="mb-3">
											<label for="nama" class="form-label">Nama Lengkap *</label>
											<input type="text" id="nama" name="nama" class="form-control" value="{{ $dataWarga->nama }}" required>
										</div>

										<div class="mb-3">
											<label for="jenis_kelamin" class="form-label">Jenis Kelamin *</label>
											<select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
												<option value="">-- Pilih --</option>
												<option value="Laki-laki" {{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
												<option value="Perempuan" {{ $dataWarga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="mb-3">
											<label for="agama" class="form-label">Agama *</label>
											<select id="agama" name="agama" class="form-select" required>
												<option value="">-- Pilih --</option>
												<option value="Islam" {{ $dataWarga->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
												<option value="Kristen" {{ $dataWarga->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
												<option value="Katolik" {{ $dataWarga->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
												<option value="Hindu" {{ $dataWarga->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
												<option value="Buddha" {{ $dataWarga->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
												<option value="Konghucu" {{ $dataWarga->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
											</select>
										</div>

										<div class="mb-3">
											<label for="pekerjaan" class="form-label">Pekerjaan</label>
											<input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{{ $dataWarga->pekerjaan }}">
										</div>

										<div class="mb-3">
											<label for="telp" class="form-label">No Telepon</label>
											<input type="text" id="telp" name="telp" class="form-control" value="{{ $dataWarga->telp }}">
										</div>

										<div class="mb-3">
											<label for="email" class="form-label">Email</label>
											<input type="email" id="email" name="email" class="form-control" value="{{ $dataWarga->email }}">
										</div>
									</div>
								</div>

								<div class="row mt-4">
									<div class="col-12 text-center">
										<button type="submit" class="main-btn btn-hover">Update Data</button>
										<a href="{{ route('warga.index') }}" class="main-btn btn-hover border-btn ms-3">Batal</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= form section end ========================= -->

	<!-- ========================= footer start ========================= -->
	<footer class="footer pt-120">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
					<div class="footer-widget">
						<div class="logo">
							<a href="{{ url('/') }}"> <img src="{{asset('assets-guest/images/logo/logo.svg') }}" alt="logo"> </a>
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
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ route('warga.index') }}">Data Warga</a></li>
						</ul>
					</div>
				</div>
				<div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
					<div class="footer-widget">
						<h3>Fitur</h3>
						<ul class="links">
							<li><a href="{{ route('warga.index') }}">Lihat Data</a></li>
							<li><a href="{{ route('warga.create') }}">Tambah Data</a></li>
							<li><a href="#0">Laporan</a></li>
							<li><a href="#0">Export Data</a></li>
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
	<script src="{{asset('assets-guest/js/bootstrap-5.0.0-beta2.min.js') }}"></script>
	<script src="{{asset('assets-guest/js/tiny-slider.js') }}"></script>
	<script src="{{asset('assets-guest/js/wow.min.js') }}"></script>
	<script src="{{asset('assets-guest/js/polyfill.js') }}"></script>
	<script src="{{asset('assets-guest/js/main.js') }}"></script>
</body>

</html>
