<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Sistem Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            /* Background yang lebih hidup */
            background: linear-gradient(135deg, #2ecc71 0%, #1abc9c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .register-container {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            transition: transform 0.3s ease-in-out;
        }
        .register-container:hover {
            transform: translateY(-5px);
        }
        .register-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 1.8rem;
        }
        .register-icon {
            font-size: 3.5rem;
            color: #1abc9c;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border: 1px solid #dee2e6;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #1abc9c;
            box-shadow: 0 0 0 0.2rem rgba(26, 188, 156, 0.25);
        }
        .btn-register-custom {
            background: #1abc9c;
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
            border-radius: 8px;
            transition: background 0.3s, transform 0.3s;
            color: white;
            font-size: 1rem;
        }
        .btn-register-custom:hover {
            background: #16a085;
            color: white;
        }
        .btn-login-link {
            background: #95a5a6; /* Warna abu-abu yang serasi */
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
            border-radius: 8px;
            transition: background 0.3s;
            color: white;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .btn-login-link:hover {
            background: #7f8c8d;
            color: white;
        }
        .password-rules {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.25rem;
            border-left: 3px solid #ccc;
            padding-left: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-container">
                    <div class="text-center">
                        <i class="fas fa-user-plus register-icon"></i>
                        <h1 class="register-title">Buat Akun Baru</h1>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul class="mb-0 list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="/auth/register" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-2"></i>Nama Lengkap
                            </label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan nama lengkap"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>Email
                            </label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Masukkan email"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-2"></i>Password
                            </label>
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                                   placeholder="Masukkan password"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="password-rules">
                                <i class="fas fa-info-circle me-1"></i>
                                Password minimal 3 karakter (sesuai validasi Anda)
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-lock me-2"></i>Konfirmasi Password
                            </label>
                            <input type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Masukkan ulang password"
                                   required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-register-custom mb-3">
                            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                        </button>

                        <a href="/auth" class="btn-login-link">
                            <i class="fas fa-sign-in-alt me-2"></i>Sudah punya akun? Masuk
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
