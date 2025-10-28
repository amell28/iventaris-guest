@extends('layouts.guest.app')

@section('content')
    <!-- Start Main Content -->
    <section class="pt-120 pb-80">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Data Warga Desa</h2>
                        <p>Kelola data warga dengan tampilan yang lebih informatif</p>
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
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">{{ $dataWarga->count() }}</div>
                        <div class="stats-label">Total Warga</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stats-number">{{ $dataWarga->where('jenis_kelamin', 'Laki-laki')->count() }}</div>
                        <div class="stats-label">Warga Laki-laki</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stats-number">{{ $dataWarga->where('jenis_kelamin', 'Perempuan')->count() }}</div>
                        <div class="stats-label">Warga Perempuan</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <div class="stats-number">{{ $dataWarga->where('pekerjaan', '!=', '')->count() }}</div>
                        <div class="stats-label">Memiliki Pekerjaan</div>
                    </div>
                </div>
            </div>

            <!-- Tambah Kategori dan Search Box -->
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
                                <h5 class="mb-0">Cari Kategori Aset</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Ketik nama atau NIK anda..."
                                    id="searchInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Warga Cards -->
            <div class="row" id="wargaContainer">
                @forelse ($dataWarga as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4 warga-item">
                        <div class="card warga-card">
                            <div class="warga-header text-center">
                                <div class="warga-avatar mx-auto">
                                    <i class="lni lni-user"></i>
                                </div>
                                <h5 class="mb-1">{{ $item->nama }}</h5>
                                <p class="mb-0 opacity-75">NIK: {{ $item->no_ktp }}</p>
                            </div>

                            <div class="warga-info">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-venus-mars"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Jenis Kelamin</strong><br>
                                        {{ $item->jenis_kelamin }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-heaven"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Agama</strong><br>
                                        {{ $item->agama }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-briefcase"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Pekerjaan</strong><br>
                                        {{ $item->pekerjaan ?: 'Tidak bekerja' }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-phone"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Telepon</strong><br>
                                        {{ $item->telp ?: '-' }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="lni lni-envelope"></i>
                                    </div>
                                    <div class="info-content">
                                        <strong>Email</strong><br>
                                        {{ $item->email ?: '-' }}
                                    </div>
                                </div>
                            </div>

                            <div class="action-buttons">
                                <div class="row">
                                    <div class="col-6">
                                        <button href="{{ route('warga.edit', $item->warga_id) }}"
                                            class="btn btn-warning btn-sm text-white">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                            class="d-inline w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                                <h4 class="text-muted">Belum ada data warga</h4>
                                <p class="text-muted">Mulai dengan menambahkan data warga pertama</p>
                                <a href="{{ route('warga.create') }}" class="main-btn btn-hover">
                                    <i class="lni lni-plus"></i> Tambah Warga Pertama
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    {{-- end main content --}}
@endsection
