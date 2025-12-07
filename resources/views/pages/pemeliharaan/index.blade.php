@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">

        {{-- ===================== --}}
        {{-- TITLE --}}
        {{-- ===================== --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>Data Pemeliharaan Aset</h2>
                    <p>Riwayat pemeliharaan aset lengkap beserta bukti foto.</p>
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
        {{-- 🚀 STATISTIK PEMELIHARAAN --}}
        {{-- ===================== --}}
        <div class="row mb-5">

            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">{{ $pemeliharaan->total() }}</div>
                    <div class="stats-label">Total Pemeliharaan</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card" style="background: linear-gradient(135deg,#43e97b,#38f9d7);">
                    <div class="stats-number">
                        {{ $pemeliharaan->filter(fn($p) => $p->media->count() > 0)->count() }}
                    </div>
                    <div class="stats-label">Memiliki Bukti Foto</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card" style="background: linear-gradient(135deg,#f093fb,#f5576c);">
                    <div class="stats-number">
                        {{ $pemeliharaan->filter(fn($p) => $p->media->count() == 0)->count() }}
                    </div>
                    <div class="stats-label">Tanpa Foto</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card" style="background: linear-gradient(135deg,#4facfe,#00f2fe);">
                    <div class="stats-number">
                        {{ $pemeliharaan->unique('aset_id')->count() }}
                    </div>
                    <div class="stats-label">Total Aset Dirawat</div>
                </div>
            </div>

        </div>


        {{-- ===================== --}}
        {{-- TOP BAR --}}
        {{-- ===================== --}}
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <a href="{{ route('pemeliharaan.create') }}" class="main-btn btn-hover btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Pemeliharaan
                </a>
            </div>

            <div class="col-md-6">
                <div class="search-box">
                    <form method="GET" action="{{ route('pemeliharaan.index') }}">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari Pemeliharaan</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                           placeholder="Ketik nama aset atau tindakan..."
                                           value="{{ request('search') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        {{-- ===================== --}}
        {{-- PEMELIHARAAN LIST --}}
        {{-- ===================== --}}
        <div class="row">

            @forelse ($pemeliharaan as $item)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-4 lokasi-item">
                    <div class="card warga-card">

                        {{-- HEADER --}}
                        <div class="warga-header text-center">
                            <div class="warga-avatar mx-auto">
                                <i class="bi bi-tools"></i>
                            </div>

                            <h5 class="mb-1">{{ $item->aset->nama_aset ?? 'Aset Tidak Ditemukan' }}</h5>
                            <p class="mb-0 opacity-75">Kode: {{ $item->aset->kode_aset ?? '-' }}</p>
                        </div>

                        {{-- DETAIL --}}
                        <div class="warga-info">

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-calendar-event"></i></div>
                                <div class="info-content">
                                    <strong>Tanggal</strong><br>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-clipboard-check"></i></div>
                                <div class="info-content">
                                    <strong>Tindakan</strong><br>
                                    {{ $item->tindakan }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-cash-stack"></i></div>
                                <div class="info-content">
                                    <strong>Biaya</strong><br>
                                    Rp {{ number_format($item->biaya, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-person"></i></div>
                                <div class="info-content">
                                    <strong>Pelaksana</strong><br>
                                    {{ $item->pelaksana ?? '-' }}
                                </div>
                            </div>

                            {{-- FOTO BUKTI --}}
                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-image"></i></div>
                                <div class="info-content">
                                    <strong>Bukti Foto</strong><br>

                                    @php $media = $item->media->first(); @endphp

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
                        <div class="action-buttons mt-3">
                            <div class="row">

                                <div class="col-6">
                                    <a href="{{ route('pemeliharaan.edit', $item->pemeliharaan_id) }}"
                                       class="btn btn-warning btn-sm text-white w-100">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                </div>

                                <div class="col-6">
                                    <form action="{{ route('pemeliharaan.destroy', $item->pemeliharaan_id) }}"
                                          method="POST" class="d-inline w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm w-100"
                                                onclick="return confirm('Hapus data pemeliharaan ini?')">
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
                            <i class="lni lni-tools display-1 text-muted mb-3"></i>
                            <h4 class="text-muted">Belum ada data pemeliharaan</h4>
                            <p class="text-muted">Tambahkan pemeliharaan pertama sekarang.</p>

                            <a href="{{ route('pemeliharaan.create') }}" class="main-btn btn-hover">
                                <i class="lni lni-plus"></i> Tambah Pemeliharaan
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $pemeliharaan->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>
@endsection
