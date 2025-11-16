@extends('layouts.guest.app')

@section('content')
    <section class="pt-120 pb-80">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        {{-- JUDUL DAN DESKRIPSI UNTUK DATA USER --}}
                        <h2>Data User Sistem</h2>
                        <p>Kelola data pengguna dengan tampilan yang lebih informatif</p>
                    </div>
                </div>
            </div>


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">{{ $dataUser->count() }}</div>
                        <div class="stats-label">Total User</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stats-number">{{ $dataUser->where('created_at', '>=', now()->subMonth())->count() }}</div>
                        <div class="stats-label">User Baru (30 Hari)</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stats-number">{{ $dataUser->where('email_verified_at', '!=', null)->count() }}</div>
                        <div class="stats-label">Email Terverifikasi</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <div class="stats-number">{{ $dataUser->where('email_verified_at', null)->count() }}</div>
                        <div class="stats-label">Belum Verifikasi</div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('user.create') }}" class="main-btn btn-hover btn-sm">
                        <i class="fas fa-plus me-1"></i>Tambah Data Aset
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="search-box">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari User</h5>
                            </div>
                            <div class="col-md-6">
                                {{-- Placeholder disesuaikan --}}
                                <input type="text" class="form-control" placeholder="Ketik nama atau email..."
                                    id="searchInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="userContainer">
                {{-- Loop menggunakan $dataUser dan $user --}}
                @forelse ($dataUser as $user)
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4 user-item">
                        <div class="card warga-card">
                            <div class="warga-header text-center">
                                <div class="warga-avatar mx-auto">
                                    <i class="lni lni-user"></i>
                                </div>
                                {{-- Menampilkan Nama --}}
                                <h5 class="mb-1">{{ $user->name }}</h5>
                                {{-- Menampilkan Email --}}
                                <p class="mb-0 opacity-75">Email: {{ $user->email }}</p>
                            </div>

                            <div class="warga-info">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-calendar"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Bergabung Sejak</strong><br>
                                        {{ $user->created_at->format('d M Y') }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-checkmark-circle"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Status Email</strong><br>
                                        <span class="fw-bold {{ $user->email_verified_at ? 'text-success' : 'text-warning' }}">
                                            {{ $user->email_verified_at ? 'Terverifikasi' : 'Belum Verifikasi' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-key"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Password Hashed</strong><br>
                                        {{-- Menampilkan sebagian hash password (HANYA UNTUK DEBUG/INFORMASI, HINDARI MENAMPILKAN INI DI PROD) --}}
                                        {{ Str::limit($user->password, 20) }}
                                    </div>
                                </div>

                            </div>

                            <div class="action-buttons">
                                <div class="row">
                                    <div class="col-6">
                                        {{-- Route disesuaikan ke user.edit dengan $user->id --}}
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="btn btn-warning btn-sm text-white w-100">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        {{-- Route disesuaikan ke user.destroy dengan $user->id --}}
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            class="d-inline w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm w-100"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus user: {{ $user->name }}?')">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card text-center py-5">
                            <div class="card-body">
                                <i class="lni lni-inbox display-1 text-muted mb-3"></i>
                                <h4 class="text-muted">Belum ada data user</h4>
                                <p class="text-muted">Mulai dengan menambahkan user pertama</p>
                                <a href="{{ route('user.create') }}" class="main-btn btn-hover">
                                    <i class="lni lni-plus"></i> Tambah User Pertama
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    {{-- end main content --}}

    {{-- Penambahan script search dari template user --}}
    @push('scripts')
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const userItems = document.querySelectorAll('.user-item'); // user-item adalah class di card loop

            userItems.forEach(item => {
                // Selector disesuaikan untuk mengambil Nama (h5) dan Email (p) di dalam .warga-header
                const userName = item.querySelector('.warga-header h5').textContent.toLowerCase();
                const userEmail = item.querySelector('.warga-header p').textContent.toLowerCase(); // Mengandung "Email: [email]"

                if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
    @endpush
@endsection
