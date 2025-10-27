@extends('layouts.guest.app')

@section('content')
	<!-- Main content start -->
	<section id="form-user" class="cta-section pt-130 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title text-center mb-50">
						<h2 class="mb-20">Edit Data User</h2>
						<p class="mb-30">Ubah data user sesuai dengan informasi terbaru</p>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card shadow-sm">
						<div class="card-body p-5">
							@if(session('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<i class="fas fa-check-circle me-2"></i>
									{{ session('success') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							@endif

							@if($errors->any())
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<i class="fas fa-exclamation-triangle me-2"></i>
									<ul class="mb-0">
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							@endif


							<form action="{{ route('user.update', $dataUser->id) }}" method="POST">
								@method('PUT')
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name" class="form-label">Nama Lengkap *</label>
											<input type="text" id="name" name="name" class="form-control"
												   value="{{ old('name', $dataUser->name) }}" required>

										</div>

										<div class="mb-3">
											<label for="email" class="form-label">Email *</label>
											<input type="email" id="email" name="email" class="form-control "
												   value="{{ old('email', $dataUser->email) }}" required>
											
										</div>



								<!-- Password Section -->
								<div class="row mt-4">
									<div class="col-12">
										<div class="card bg-light">
											<div class="card-header">
												<h6 class="mb-0"><i class="fas fa-key me-2"></i>Ubah Password</h6>
												<small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<div class="mb-3">
															<label for="password" class="form-label">Password Baru</label>
															<input type="password" id="password" name="password"
																   class="form-control @error('password') is-invalid @enderror"
																   placeholder="Masukkan password baru">
															@error('password')
																<div class="invalid-feedback">{{ $message }}</div>
															@enderror
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3">
															<label for="password_confirmation" class="form-label">Konfirmasi Password</label>
															<input type="password" id="password_confirmation" name="password_confirmation"
																   class="form-control" placeholder="Konfirmasi password baru">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row mt-4">
									<div class="col-12 text-center">
										<button type="submit" class="main-btn btn-hover">
											<i class="fas fa-save me-2"></i>Update User
										</button>
										<a href="{{ route('user.index') }}" class="main-btn btn-hover border-btn ms-3">
											<i class="fas fa-times me-2"></i>Batal
										</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- main content end -->
@endsection
