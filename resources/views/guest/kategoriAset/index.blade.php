@extends('layouts.guest.app')

@section('content')
    <!-- Main Content start  -->
    <section class="pt-120 pb-80">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Kategori Aset Desa</h2>
                        <p>Kelola kategori aset dengan tampilan yang modern</p>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Statistics -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="stats-number">{{ $kategoriAset->count() }}</div>
                        <div class="stats-label">Total Kategori</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stats-number">{{ $kategoriAset->where('deskripsi', '!=', '')->count() }}</div>
                        <div class="stats-label">Kategori dengan Deskripsi</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stats-number">{{ $kategoriAset->count() }}</div>
                        <div class="stats-label">Total Kode Unik</div>
                    </div>
                </div>
            </div>
            
            <!-- Tambah Kategori dan Search Box -->
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('kategoriAset.create') }}" class="main-btn btn-hover">
                        <i class="lni lni-plus"></i> Tambah Kategori
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="search-box">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari Kategori Aset</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Ketik nama kategori atau kode..."
                                    id="searchInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori Cards -->
            <div class="row" id="kategoriContainer">
                @forelse($kategoriAset as $kategori)
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4 kategori-item">
                        <div class="card kategori-card">
                            <div class="kategori-header text-center">
                                <div class="kategori-icon mx-auto">
                                    <i class="lni lni-layers"></i>
                                </div>
                                <h4 class="mb-2">{{ $kategori->nama }}</h4>
                                <span class="kategori-badge">{{ $kategori->kode }}</span>
                            </div>

                            <div class="kategori-content">
                                <div class="mb-3">
                                    <small class="text-muted">Deskripsi:</small>
                                    <p class="mb-0">{{ $kategori->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                                </div>

                                <div class="row text-center">
                                    <div class="col-6">
                                        <small class="text-muted">Dibuat</small>
                                        <p class="mb-0 fw-bold">{{ $kategori->created_at->format('d/m/Y') }}</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Diupdate</small>
                                        <p class="mb-0 fw-bold">{{ $kategori->updated_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="kategori-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('kategoriAset.edit', $kategori->kategori_id) }}"
                                            class="btn btn-warning btn-sm w-100" title="Edit">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('kategoriAset.destroy', $kategori->kategori_id) }}"
                                            method="POST" class="d-inline w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm w-100" title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                                <i class="lni lni-trash"></i>
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
                                <h4 class="text-muted">Belum ada data kategori aset</h4>
                                <p class="text-muted">Mulai dengan menambahkan kategori pertama</p>
                                <a href="{{ route('kategoriAset.create') }}" class="main-btn btn-hover">
                                    <i class="lni lni-plus"></i> Tambah Kategori Pertama
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    {{-- main content end --}}
@endsection
