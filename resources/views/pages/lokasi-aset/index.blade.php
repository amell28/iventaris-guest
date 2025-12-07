@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">

        {{-- TITLE --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>Data Lokasi Aset</h2>
                    <p>Informasi lokasi aset lengkap beserta foto/denah.</p>
                </div>
            </div>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        {{-- ===================== --}}
        {{-- 🚀 STATISTIK LOKASI ASET --}}
        {{-- ===================== --}}
        <div class="row mb-5">

            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">{{ $lokasiAset->total() }}</div>
                    <div class="stats-label">Total Lokasi Aset</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <div class="stats-number">
                        {{ $lokasiAset->filter(fn($l) => $l->media->count() > 0)->count() }}
                    </div>
                    <div class="stats-label">Memiliki Foto</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="stats-number">
                        {{ $lokasiAset->filter(fn($l) => $l->media->count() == 0)->count() }}
                    </div>
                    <div class="stats-label">Tidak Ada Foto</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="stats-number">
                        {{ $lokasiAset->unique('aset_id')->count() }}
                    </div>
                    <div class="stats-label">Total Aset Berlokasi</div>
                </div>
            </div>

        </div>


        {{-- ===================== --}}
        {{-- TOP BAR --}}
        {{-- ===================== --}}
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <a href="{{ route('lokasi-aset.create') }}" class="main-btn btn-hover btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Lokasi Aset
                </a>
            </div>
            <div class="col-md-6">
                <div class="search-box">
                    <form method="GET" action="{{ route('lokasi-aset.index') }}">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari Lokasi Aset</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                           placeholder="Ketik nama aset atau lokasi..."
                                           value="{{ request('search') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- ===================== --}}
        {{-- LOKASI LIST --}}
        {{-- ===================== --}}
        <div class="row">

            @forelse ($lokasiAset as $lokasi)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-4 lokasi-item">
                    <div class="card warga-card">

                        {{-- HEADER --}}
                        <div class="warga-header text-center">
                            <div class="warga-avatar mx-auto">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <h5 class="mb-1">{{ $lokasi->aset->nama_aset ?? 'Aset Tidak Ditemukan' }}</h5>
                            <p class="mb-0 opacity-75">Kode: {{ $lokasi->aset->kode_aset ?? '-' }}</p>
                        </div>

                        {{-- DETAIL --}}
                        <div class="warga-info">

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-map"></i></div>
                                <div class="info-content">
                                    <strong>Lokasi Text</strong><br>
                                    {{ $lokasi->lokasi_text ?? '-' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-house"></i></div>
                                <div class="info-content">
                                    <strong>RT / RW</strong><br>
                                    RT {{ $lokasi->rt }} / RW {{ $lokasi->rw }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-card-text"></i></div>
                                <div class="info-content">
                                    <strong>Keterangan</strong><br>
                                    {{ $lokasi->keterangan ?? '-' }}
                                </div>
                            </div>

                            {{-- FOTO / MEDIA --}}
                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-image"></i></div>
                                <div class="info-content">
                                    <strong>Foto / Denah</strong><br>

                                    @php $media = $lokasi->media->first(); @endphp

                                    @if ($media)
                                        <img src="{{ asset('storage/' . $media->file_url) }}"
                                             class="img-thumbnail mt-2"
                                             style="height:150px; width:100%; object-fit:cover; border-radius:10px;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        {{-- BUTTON ACTION --}}
                        <div class="action-buttons">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('lokasi-aset.edit', $lokasi->lokasi_id) }}"
                                       class="btn btn-warning btn-sm text-white w-100">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                </div>

                                <div class="col-6">
                                    <form action="{{ route('lokasi-aset.destroy', $lokasi->lokasi_id) }}"
                                          method="POST" class="d-inline w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm w-100"
                                                onclick="return confirm('Hapus lokasi aset ini?')">
                                            <i class="fas fa-trash me-1"></i>Hapus
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
                            <i class="lni lni-map display-1 text-muted mb-3"></i>
                            <h4 class="text-muted">Belum ada lokasi aset</h4>
                            <p class="text-muted">Tambahkan lokasi aset pertama sekarang.</p>

                            <a href="{{ route('lokasi-aset.create') }}" class="main-btn btn-hover">
                                <i class="lni lni-plus"></i> Tambah Lokasi
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $lokasiAset->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>
@endsection
