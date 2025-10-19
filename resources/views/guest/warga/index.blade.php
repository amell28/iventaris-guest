<!DOCTYPE html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Data Warga</title>
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
							<a class="navbar-brand" href="{{ route('dashboard') }}">
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
								<a href="{{ route('warga.create') }}" class="main-btn btn-hover">Tambah Warga</a>
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

	<!-- ========================= data warga section start ========================= -->
	<section id="data-warga" class="cta-section pt-130 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title text-center mb-50">
						<h2 class="mb-20">Data Warga</h2>
						<p class="mb-30">Kelola data warga dengan mudah dan efisien</p>
					</div>
				</div>
			</div>

			@if (session('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{!! session('success') !!}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif

			<div class="row">
				<div class="col-12">
					<div class="card shadow-sm">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead class="table-dark">
										<tr>
											<th>No KTP</th>
											<th>Nama</th>
											<th>Jenis Kelamin</th>
											<th>Agama</th>
											<th>Pekerjaan</th>
											<th>Telp</th>
											<th>Email</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($dataWarga as $item)
											<tr>
												<td>{{ $item->no_ktp }}</td>
												<td>{{ $item->nama }}</td>
												<td>{{ $item->jenis_kelamin }}</td>
												<td>{{ $item->agama }}</td>
												<td>{{ $item->pekerjaan }}</td>
												<td>{{ $item->telp }}</td>
												<td>{{ $item->email }}</td>
												<td>
													<div class="btn-group" role="group">
														<a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-sm btn-warning">
															Edit
														</a>
														<form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" style="display:inline">
															@csrf
															@method('DELETE')
															<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
																Hapus
															</button>
														</form>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= data warga section end ========================= -->

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
