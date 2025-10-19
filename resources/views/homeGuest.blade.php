<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Home - Sistem Inventaris & Aset</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #2ecc71;
            --warning: #f39c12;
        }

        .hero-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        .inventory-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            height: 100%;
        }

        .inventory-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .card-image {
            height: 180px;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--secondary);
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .stat-card {
            border: none;
            border-radius: 10px;
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: scale(1.05);
        }

        .quick-action-item {
            transition: all 0.3s;
            border: none;
            text-align: left;
        }

        .quick-action-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .navbar-brand {
            font-weight: 600;
        }

        .footer {
            background-color: var(--dark);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-boxes me-2"></i>
                <span>Sistem Inventaris & Aset</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inventaris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">{{ $heroData['title'] }}</h1>
                    <p class="lead mb-4">{{ $heroData['description'] }}</p>
                    <a href="{{ $heroData['button_url'] }}" class="btn btn-danger btn-lg px-4 py-2">
                        <i class="fas fa-eye me-2"></i>{{ $heroData['button_text'] }}
                    </a>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-boxes display-1 opacity-75"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Inventory Section -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 text-primary">Daftar Inventaris Terbaru</h2>
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>

                <div class="row">
                    @foreach($inventories as $inventory)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card inventory-card h-100">
                                <div class="card-image">
                                    <i class="fas fa-{{ $inventory['image_icon'] }}"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $inventory['name'] }}</h5>
                                    <p class="card-text text-muted small mb-2">
                                        <i class="fas fa-tag me-1"></i>Kategori: {{ $inventory['category'] }}
                                    </p>
                                    <p class="card-text text-muted small mb-2">
                                        <i class="fas fa-map-marker-alt me-1"></i>Lokasi: {{ $inventory['location'] }}
                                    </p>
                                    <p class="card-text small text-muted mb-3">
                                        {{ Str::limit($inventory['description'], 80) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ \Carbon\Carbon::parse($inventory['purchase_date'])->format('d M Y') }}
                                        </small>
                                        <span class="status-badge badge bg-{{ $inventory['status_color'] }}">
                                            {{ $inventory['status_label'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Statistics Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0 text-primary">
                            <i class="fas fa-chart-bar me-2"></i>Statistik Inventaris
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6 mb-3">
                                <div class="card stat-card border-primary">
                                    <div class="card-body">
                                        <h3 class="text-primary mb-1">{{ $stats['total'] }}</h3>
                                        <small class="text-muted">Total Barang</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card stat-card border-success">
                                    <div class="card-body">
                                        <h3 class="text-success mb-1">{{ $stats['available'] }}</h3>
                                        <small class="text-muted">Tersedia</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card stat-card border-warning">
                                    <div class="card-body">
                                        <h3 class="text-warning mb-1">{{ $stats['in_use'] }}</h3>
                                        <small class="text-muted">Digunakan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card stat-card border-danger">
                                    <div class="card-body">
                                        <h3 class="text-danger mb-1">{{ $stats['maintenance'] }}</h3>
                                        <small class="text-muted">Perbaikan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Quick Actions -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0 text-primary">
                            <i class="fas fa-bolt me-2"></i>Aksi Cepat
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach($quickActions as $action)
                                <a href="{{ $action['url'] }}" class="list-group-item list-group-item-action quick-action-item">
                                    <i class="fas fa-{{ $action['icon'] }} me-2 text-muted"></i>
                                    {{ $action['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>Tentang Kami</h5>
                    <p class="text-light">Sistem manajemen inventaris dan aset perusahaan yang membantu Anda mengelola barang dengan efisien dan efektif.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Beranda</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Inventaris</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Aset</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Laporan</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled text-light">
                        <li><i class="fas fa-envelope me-2"></i> info@inventorysystem.com</li>
                        <li><i class="fas fa-phone me-2"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Sudirman No. 123, Pekanbaru</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">Project Bina desa</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
