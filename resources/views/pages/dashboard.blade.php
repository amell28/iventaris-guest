@extends('layouts.guest.app')

@section('content')
{{-- main content start --}}
	<!-- ========================= hero-section start ========================= -->
	<section id="home" class="hero-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-10">
					<div class="hero-content">
						<h1>Sistem Manajemen Inventaris dan Aset Desa</h1>
						<p class="mt-3">Platform digital terintegrasi untuk mengelola dan memantau seluruh inventaris serta aset desa secara efisien, transparan, dan akurat.</p>
						<a href="#about" class="main-btn btn-hover border-btn mt-3">Pelajari Lebih Lanjut</a>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="hero-image text-center text-lg-end">
						<img src="{{asset('assets-guest/images/hero/dome.png') }}" alt="Sistem Manajemen Inventaris">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= hero-section end ========================= -->

	<!-- ========================= about-section start ========================= -->
	<section id="about" class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 order-last order-lg-first">
					<div class="about-image">
						<img src="{{asset('assets-guest/images/about/asset-tracking.svg') }}" alt="Pelacakan Aset Desa">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-content-wrapper">
						<div class="section-title">
							<h2 class="mb-20">Sistem Terpadu Pengelolaan Aset Desa</h2>
							<p class="mb-30">Sistem Bina Desa dirancang khusus untuk membantu pemerintah desa dalam mengelola inventaris dan aset secara digital. Dengan sistem ini, setiap barang inventaris dan aset desa dapat tercatat, terpantau, dan terlacak dengan mudah, mengurangi resiko kehilangan dan meningkatkan akuntabilitas pengelolaan barang milik desa.</p>

							<h5 class="mt-4">Fitur Utama Sistem:</h5>
							<ul class="list-unstyled mt-3">
								<li><i class="fas fa-check-circle text-success me-2"></i> Katalogisasi inventaris lengkap</li>
								<li><i class="fas fa-check-circle text-success me-2"></i> Pelacakan kondisi dan lokasi aset</li>
								<li><i class="fas fa-check-circle text-success me-2"></i> Pencatatan pemeliharaan berkala</li>
								<li><i class="fas fa-check-circle text-success me-2"></i> Laporan real-time kondisi aset</li>
								<li><i class="fas fa-check-circle text-success me-2"></i> Monitoring penggunaan inventaris</li>
							</ul>

							<a href="#0" class="main-btn btn-hover border-btn mt-3">Lihat Demo Sistem</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= about-section end ========================= -->


	<!-- ========================= benefits-section start ========================= -->
	<section id="benefits" class="benefits-section pt-100 pb-100" style="background-color: #f8f9fa;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xxl-5 col-xl-6 col-lg-7 col-md-10">
					<div class="section-title text-center">
						<h2>Manfaat Penggunaan Sistem</h2>
						<p>Keuntungan implementasi sistem manajemen inventaris dan aset digital</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="benefit-item d-flex mb-4">
						<div class="icon flex-shrink-0">
							<i class="fas fa-search-dollar fa-2x text-primary"></i>
						</div>
						<div class="content ms-4">
							<h4>Transparansi Pengelolaan</h4>
							<p>Setiap transaksi dan pergerakan aset tercatat rapi dan dapat diakses oleh pihak yang berwenang</p>
						</div>
					</div>

					<div class="benefit-item d-flex mb-4">
						<div class="icon flex-shrink-0">
							<i class="fas fa-chart-line fa-2x text-primary"></i>
						</div>
						<div class="content ms-4">
							<h4>Efisiensi Operasional</h4>
							<p>Mengurangi waktu pencarian aset dan mempermudah proses inventarisasi tahunan</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="benefit-item d-flex mb-4">
						<div class="icon flex-shrink-0">
							<i class="fas fa-shield-alt fa-2x text-primary"></i>
						</div>
						<div class="content ms-4">
							<h4>Pengamanan Aset</h4>
							<p>Meminimalisir resiko kehilangan dan penyalahgunaan aset desa</p>
						</div>
					</div>

					<div class="benefit-item d-flex mb-4">
						<div class="icon flex-shrink-0">
							<i class="fas fa-file-invoice-dollar fa-2x text-primary"></i>
						</div>
						<div class="content ms-4">
							<h4>Akuntabilitas Keuangan</h4>
							<p>Laporan keuangan yang akurat terkait nilai dan penyusutan aset</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= benefits-section end ========================= -->

{{-- main content end --}}
@endsection
