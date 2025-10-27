@extends('layouts.guest.app')

@section('content')
	<!-- ========================= main content start ========================= -->
	<section class="hero-section pt-130">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card shadow-sm">
						<div class="card-header bg-primary text-white">
							<h4 class="mb-0"><i class="lni lni-plus"></i> Create New User</h4>
						</div>
						<div class="card-body p-4">
							@if($errors->any())
								<div class="alert alert-danger">
									<ul class="mb-0">
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							<form action="{{ route('user.store') }}" method="POST"> <!-- Diubah dari user.index ke user.store -->
								@csrf

								<div class="mb-3">
									<label for="name" class="form-label">Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control @error('name') is-invalid @enderror"
										   id="name" name="name" value="{{ old('name') }}"
										   placeholder="Enter full name" required>
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>

								<div class="mb-3">
									<label for="email" class="form-label">Email <span class="text-danger">*</span></label>
									<input type="email" class="form-control @error('email') is-invalid @enderror"
										   id="email" name="email" value="{{ old('email') }}"
										   placeholder="Enter email address" required>
									@error('email')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>

								<div class="mb-3">
									<label for="password" class="form-label">Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control @error('password') is-invalid @enderror"
										   id="password" name="password"
										   placeholder="Enter password" required>
									@error('password')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>

								<div class="mb-4">
									<label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control"
										   id="password_confirmation" name="password_confirmation"
										   placeholder="Confirm password" required>
								</div>

								<div class="d-flex gap-2">
									<button type="submit" class="btn btn-primary btn-hover flex-fill">
										<i class="lni lni-save"></i> Create User
									</button>
									<a href="{{ route('user.index') }}" class="btn btn-secondary btn-hover">
										<i class="lni lni-arrow-left"></i> Back
									</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= main content end ========================= -->
@endsection
