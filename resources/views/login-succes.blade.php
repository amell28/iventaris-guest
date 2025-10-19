<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil - Sistem Inventaris</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #a89bb5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .success-container {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="success-container">
                    <h2 class="text-success mb-3">Login Berhasil!</h2>

                <div class="mt-4">
                    <p><strong> Data yang akan dikirim: </strong></p>
                    <ul class="list-unstyled">
                        <li> Username: <strong>{{ $username}}</strong></li>
                        <li> Password: <strong>{{ $password}}</strong></li>
                    </ul>
                </div>

                    <a href="/auth" class="btn btn-primary">Kembali ke Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
