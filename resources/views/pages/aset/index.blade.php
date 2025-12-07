@extends('layouts.guest.app')

@section('content')
<section class="pt-120 pb-80">
    <div class="container-custom">

        {{-- TITLE --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>Data Aset Inventaris</h2>
                    <p>Daftar lengkap semua aset yang terdata dalam bentuk kartu.</p>
                </div>
            </div>
        </div>

        {{-- MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- STATS --}}
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">{{ $aset->count() }}</div>
                    <div class="stats-label">Total Aset</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card" style="background:linear-gradient(135deg,#43e97b,#38f9d7);">
                    <div class="stats-number">{{ $aset->where('kondisi','Baik')->count() }}</div>
                    <div class="stats-label">Baik</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card" style="background:linear-gradient(135deg,#f093fb,#f5576c);">
                    <div class="stats-number">{{ $aset->where('kondisi','Rusak Ringan')->count() }}</div>
                    <div class="stats-label">Rusak Ringan</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card" style="background:linear-gradient(135deg,#4facfe,#00f2fe);">
                    <div class="stats-number">{{ $aset->where('kondisi','Rusak Berat')->count() }}</div>
                    <div class="stats-label">Rusak Berat</div>
                </div>
            </div>
        </div>

        {{-- ACTION BAR --}}
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <a href="{{ route('aset.create') }}" class="main-btn btn-hover btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Aset
                </a>
            </div>

            <div class="col-md-6">
                <form method="GET" action="{{ route('aset.index') }}" class="search-box">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama atau kode aset..."
                            value="{{ request('search') }}">
                    </div>
                </form>
            </div>
        </div>

        {{-- FILTER --}}
        <form method="GET" action="{{ route('aset.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <select name="kondisi" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Kondisi</option>
                        <option value="Baik" {{ request('kondisi')=='Baik'?'selected':'' }}>Baik</option>
                        <option value="Rusak Ringan" {{ request('kondisi')=='Rusak Ringan'?'selected':'' }}>Rusak Ringan</option>
                        <option value="Rusak Berat" {{ request('kondisi')=='Rusak Berat'?'selected':'' }}>Rusak Berat</option>
                    </select>
                </div>
            </div>
        </form>

        {{-- CARD LIST --}}
        <div class="row">
            @forelse ($aset as $item)
                @php
                    $foto = optional($item->media->first())->file_url;
                @endphp

                <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                    <div class="card warga-card">

                        {{-- FOTO ASET --}}
                        <div class="warga-header text-center">
                            @if ($foto)
                                <img src="{{ asset('storage/' . $foto) }}"
                                     class="img-fluid rounded mb-3"
                                     style="height:160px; object-fit:cover;">
                            @else
                                <img src="https://via.placeholder.com/300x160?text=Tidak+Ada+Foto"
                                     class="img-fluid rounded mb-3">
                            @endif

                            <h5 class="mb-1">{{ $item->nama_aset }}</h5>
                            <p class="opacity-75">Kode: {{ $item->kode_aset }}</p>
                        </div>

                        {{-- DETAIL --}}
                        <div class="warga-info">

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-tags-fill"></i></div>
                                <div class="info-content">
                                    <strong>Kategori</strong><br>
                                    {{ $item->kategoriAset->nama ?? '-' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-currency-dollar"></i></div>
                                <div class="info-content">
                                    <strong>Nilai Perolehan</strong><br>
                                    Rp {{ number_format($item->nilai_perolehan, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-calendar-event"></i></div>
                                <div class="info-content">
                                    <strong>Tanggal Perolehan</strong><br>
                                    {{ \Carbon\Carbon::parse($item->tanggal_perolehan)->format('d M Y') }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="bi bi-person-badge-fill"></i></div>
                                <div class="info-content">
                                    <strong>Penanggung Jawab</strong><br>
                                    {{ $item->penanggung_jawab }}
                                </div>
                            </div>

                        </div>

                        {{-- BUTTONS --}}
                        <div class="action-buttons">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('aset.edit', $item->aset_id) }}"
                                       class="btn btn-warning btn-sm text-white w-100">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                </div>

                                <div class="col-6">
                                    <form action="{{ route('aset.destroy', $item->aset_id) }}"
                                          method="POST" class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm w-100"
                                            onclick="return confirm('Hapus aset {{ $item->nama_aset }}?')">
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
                        <h4 class="text-muted">Belum ada data aset</h4>
                        <a href="{{ route('aset.create') }}" class="main-btn btn-hover mt-3">
                            Tambah Aset Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $aset->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>
@endsection
