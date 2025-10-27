<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem Inventaris</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #68c4eb 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }

        .login-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .rules-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #3498db;
        }

        .rule-item {
            margin-bottom: 0.5rem;
            color: #555;
            font-size: 0.9rem;
        }

        .rule-item:last-child {
            margin-bottom: 0;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .btn-login {
            background: #2c3e50;
            border: none;
            padding: 12px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn-login:hover {
            background: #34495e;
        }

        .demo-info {
            background: #e8f5e8;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #2d5016;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <!-- Title -->
                    <h1 class="login-title text-center">Login Sistem Inventaris</h1>


                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form action="/auth/login" method="POST">
                        @csrf

                        <!-- Username Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        </div>
                        <button type="submit" class="btn btn-login btn-primary w-100"> Login </button>

                        <!-- Register Link -->
                        <div class="mt-4 text-center">
                            <p class="text-muted">Belum punya akun?
                                <a href="/auth/register" class="text-decoration-none">Daftar di sini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
