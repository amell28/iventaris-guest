<!DOCTYPE html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>SaaSIntro | Bootstrap 5 SaaS Landing Page</title>
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
							<a class="navbar-brand" href="index.html">
								<img src="{{asset('assets-guest/images/logo/logo.svg') }}" alt="Logo" />
							</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
								<div class="ms-auto">
									<ul id="nav" class="navbar-nav ms-auto">
										<li class="nav-item">
											<a class="page-scroll active" href="#home">Home</a>
										</li>
										<li class="nav-item">
											<a class="page-scroll" href="#about">About</a>

									</ul>
								</div>

							</div>
							<!-- navbar collapse -->
							<div class="header-btn">
								<a href="#0" class="main-btn btn-hover">Download</a>
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

	<!-- ========================= hero-section start ========================= -->
	<section id="home" class="hero-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-10">
					<div class="hero-content">
						<h1>You are using free lite version of SaaSIntro</h1>
						<p>Please, purchase full version of the template to get all sections, elements and permission to
							remove footer credits.</p>

						<a href="#0" class="main-btn btn-hover">Buy Now</a>
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
							<h2 class="mb-20">Perfect Solution Thriving Online Business</h2>
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
	<!-- ========================= cta-section end ========================= -->

	<!-- ========================= footer start ========================= -->
	<footer class="footer pt-120">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
					<div class="footer-widget">
						<div class="logo">
							<a href="index.html"> <img src="{{asset('assets-guest/images/logo/logo.svg') }}" alt="logo"> </a>
						</div>
						<p class="desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed dinonumy eirmod
							tempor invidunt.</p>
						<ul class="social-links">
							<li><a href="#0"><i class="lni lni-facebook"></i></a></li>
							<li><a href="#0"><i class="lni lni-linkedin"></i></a></li>
							<li><a href="#0"><i class="lni lni-instagram"></i></a></li>
							<li><a href="#0"><i class="lni lni-twitter"></i></a></li>
						</ul>
						© all rights reserved by <a href="https://uideck.com/" target="_blank">UIdeck</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
					</div>

				</div>
				<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 offset-xl-1">
					<div class="footer-widget">
						<h3>About Us</h3>
						<ul class="links">
							<li><a href="#0">Home</a></li>
							<li><a href="#0">About</a></li>
						</ul>
					</div>
				</div>
				<div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
					<div class="footer-widget">
						<h3>Services</h3>
						<ul class="links">
							<li><a href="#0">SaaS Focused</a></li>
							<li><a href="#0">Awesome Design</a></li>
							<li><a href="#0">Ready to Use</a></li>
							<li><a href="#0">Essential Selection</a></li>
						</ul>
					</div>
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
