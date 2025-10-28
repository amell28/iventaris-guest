@extends('layouts.guest.app')

@section('content')
    <!-- Start Main Content -->
    <section class="pt-120 pb-80">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
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

            <!-- Statistics Row -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="stats-number">{{ $dataUser->count() }}</div>
                        <div class="stats-label">Total User</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stats-number">{{ $dataUser->where('created_at', '>=', now()->subMonth())->count() }}</div>
                        <div class="stats-label">User Baru (30 Hari)</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stats-number">{{ $dataUser->where('email_verified_at', '!=', null)->count() }}</div>
                        <div class="stats-label">Email Terverifikasi</div>
                    </div>
                </div>
            </div>

            <!-- Tambah User dan Search Box -->
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                   <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus me-1"></i>Tambah Data
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="search-box">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari User</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                       placeholder="Ketik nama atau email..." id="searchInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Cards -->
            <div class="row" id="userContainer">
                @forelse ($dataUser as $user)
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4 user-item">
                        <div class="card user-card">
                            <!-- Compact Header -->
                            <div class="user-header-compact text-center p-3">
                                <div class="user-avatar-small mx-auto mb-2">
                                    <i class="lni lni-user"></i>
                                </div>
                                <h6 class="mb-1 text-truncate">{{ $user->name }}</h6>
                                <small class="text-muted text-truncate d-block">{{ $user->email }}</small>
                            </div>

                            <!-- Compact Info -->
                            <div class="user-info-compact p-3">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="info-item-compact">
                                            <i class="lni lni-calendar text-primary me-1"></i>
                                            <small>Bergabung</small>
                                            <div class="fw-bold">{{ $user->created_at->format('d M Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-item-compact">
                                            <i class="lni lni-verified text-primary me-1"></i>
                                            <small>Status</small>
                                            <div class="fw-bold {{ $user->email_verified_at ? 'text-success' : 'text-warning' }}">
                                                {{ $user->email_verified_at ? 'Terverifikasi' : 'Belum' }}
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-6">
                                        <div class="info-item-compact">
                                            <i class="lni lni-verified text-primary me-1"></i>
                                            <small>Password</small>
                                            <div class="fw-bold {{ $user->password  }}">
                                            <div class="fw-bold">{{ $user->password  }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Compact Action Buttons -->
                            <div class="action-buttons-compact p-3 border-top">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                           class="btn btn-outline-warning btn-sm w-100 py-1">
                                            <i class="lni lni-pencil"></i> Edit
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                              class="d-inline w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm w-100 py-1"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                <i class="lni lni-trash"></i> Hapus
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

    @push('scripts')
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const userItems = document.querySelectorAll('.user-item');

            userItems.forEach(item => {
                const userName = item.querySelector('h6').textContent.toLowerCase();
                const userEmail = item.querySelector('small').textContent.toLowerCase();

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
