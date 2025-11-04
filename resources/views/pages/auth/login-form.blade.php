<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Inventaris Aset Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            /* Background yang lebih dinamis */
            background: linear-gradient(135deg, #1abc9c 0%, #3498db 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        .login-icon {
            font-size: 3.5rem;
            color: #3498db;
            margin-bottom: 0.5rem;
        }

        .login-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 2rem;
            font-size: 1.8rem;
        }

        .form-control {
            border: 1px solid #dee2e6;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-login-custom {
            background: #3498db;
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
            border-radius: 8px;
            transition: background 0.3s, transform 0.3s;
            color: white;
            font-size: 1rem;
        }

        .btn-login-custom:hover {
            background: #2980b9;
            color: white;
        }

        .register-link {
            font-size: 0.95rem;
        }

        .demo-info {
            background: #e8f5e8;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #2d5016;
            border-left: 4px solid #1abc9c;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <div class="text-center">
                        <i class="fas fa-sign-in-alt login-icon"></i>
                        <h1 class="login-title">Masuk ke Sistem</h1>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                             <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul class="mb-0 list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/auth/login" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>Email
                            </label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Masukkan alamat email">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-2"></i>Password
                            </label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                        </div>
                        <button type="submit" class="btn btn-login-custom">
                            <i class="fas fa-arrow-right-to-bracket me-2"></i>Login
                        </button>

                        <div class="mt-4 text-center register-link">
                            <p class="text-muted">Belum punya akun?
                                <a href="/auth/register" class="text-decoration-none fw-bold" style="color: #3498db;">Daftar di sini</a>
                            </p>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
