@extends('layouts.guest.app')

@section('content')
{{-- main content start --}}
	<!-- ========================= hero-section start ========================= -->
	<section id="home" class="hero-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-10">
					<div class="hero-content">
						<h1>Selamat Datang di Bina Desa Iventaris dan Aset</h1>


					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="hero-image text-center text-lg-end">
						<img src="{{asset('assets-guest/images/hero/hero-image.svg') }}" alt="">
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
						<img src="{{asset('assets-guest/images/about/about-image.svg') }}" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-content-wrapper">
						<div class="section-title">
							<h2 class="mb-20">Perfect Sistem Iventaris dan aset</h2>
							<p class="mb-30">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed dinonumy
								eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
								vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
								takimata sanctus est Lorem.Lorem ipsum dolor sit amet.</p>
							<a href="#0" class="main-btn btn-hover border-btn">Discover More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= about-section end ========================= -->

{{--
	<!-- ========================= cta-section start ========================= -->
	<section id="cta" class="cta-section pt-130 pb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-10">
					<div class="cta-content-wrapper">
						<div class="section-title">
							<h2 class="mb-20">Quick & Easy to <br class="d-none d-lg-block"> Use Bootstrap Template</h2>
							<p class="mb-30">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed dinonumy
								eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
								vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergre.</p>
							<a href="#0" class="main-btn btn-hover border-btn">Try it Free</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="cta-image text-lg-end">
						<img src="{{asset('assets-guest/images/cta/cta-image.svg') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= cta-section end ========================= --> --}}
{{-- main content end --}}
@endsection
