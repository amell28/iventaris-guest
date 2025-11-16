@extends('layouts.guest.app')

@section('content')
    <section class="pt-120 pb-80">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-12">
                    {{-- Menyesuaikan Section Title Warga Index --}}
                    <div class="section-title text-center mb-50">
                        <h2>Data Aset Inventaris</h2>
                        <p>Daftar lengkap semua aset yang terdata dalam bentuk kartu.</p>
                    </div>
                </div>
            </div>

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Statistik Aset (Menggunakan style stats-card Warga Index) --}}
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="stats-card">
                        <div class="stats-number">{{ $aset->count() }}</div>
                        <div class="stats-label">Total Aset</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <div class="stats-number">{{ $aset->where('kondisi', 'Baik')->count() }}</div>
                        <div class="stats-label">Kondisi Baik</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stats-number">{{ $aset->where('kondisi', 'Rusak Ringan')->count() }}</div>
                        <div class="stats-label">Rusak Ringan</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stats-number">{{ $aset->where('kondisi', 'Rusak Berat')->count() }}</div>
                        <div class="stats-label">Rusak Berat</div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('aset.create') }}" class="main-btn btn-hover btn-sm">
                        <i class="fas fa-plus me-1"></i>Tambah Data Aset
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="search-box">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">Cari Aset</h5>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Ketik Kode atau Nama Aset..."
                                    id="searchInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="asetContainer">
                @forelse ($aset as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4 aset-item">
                        <div class="card warga-card">
                            {{-- Header Card (Aset Name & Code) --}}
                            <div class="warga-header text-center">
                                <div class="warga-avatar mx-auto">
                                    <i class="bi bi-box-seam"></i> {{-- Menggunakan ikon Aset --}}
                                </div>
                                <h5 class="mb-1">{{ $item->nama_aset }}</h5>
                                <p class="mb-0 opacity-75">Kode: {{ $item->kode_aset }}</p>
                            </div>

                            {{-- Detail Aset (Menggantikan detail Warga) --}}
                            <div class="warga-info">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-tags-fill"></i> {{-- Kategori --}}
                                    </div>
                                    <div class="info-content">
                                        <strong>Kategori</strong><br>
                                        {{ $item->kategoriAset->nama ?? 'N/A' }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-geo-alt-fill"></i> {{-- Lokasi --}}
                                    </div>
                                    <div class="info-content">
                                        <strong>Lokasi</strong><br>
                                        {{ $item->lokasi }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-currency-dollar"></i> {{-- Nilai Perolehan --}}
                                    </div>
                                    <div class="info-content">
                                        <strong>Nilai Perolehan</strong><br>
                                        Rp. {{ number_format($item->nilai_perolehan, 0, ',', '.') }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-calendar-date-fill"></i> {{-- Tanggal Perolehan --}}
                                    </div>
                                    <div class="info-content">
                                        <strong>Tgl Perolehan</strong><br>
                                        {{ \Carbon\Carbon::parse($item->tanggal_perolehan)->format('d M Y') }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-person-badge-fill"></i> {{-- Penanggung Jawab --}}
                                    </div>
                                    <div class="info-content">
                                        <strong>Penanggung Jawab</strong><br>
                                        {{ $item->penanggung_jawab }}
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-activity"></i> {{-- Kondisi --}}
                                    </div>
                                    <div class="info-content">
                                        <strong>Kondisi</strong><br>
                                        @if ($item->kondisi == 'Baik')
                                            <span class="badge bg-success">{{ $item->kondisi }}</span>
                                        @elseif($item->kondisi == 'Rusak Ringan')
                                            <span class="badge bg-warning text-dark">{{ $item->kondisi }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $item->kondisi }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            {{-- Tombol Aksi --}}
                            <div class="action-buttons">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('aset.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm text-white w-100">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('aset.destroy', $item->id) }}" method="POST"
                                            class="d-inline w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm w-100"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus aset: {{ $item->nama_aset }}?')">
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
                                <h4 class="text-muted">Belum ada data aset inventaris</h4>
                                <p class="text-muted">Mulai dengan menambahkan data aset pertama</p>
                                <a href="{{ route('aset.create') }}" class="main-btn btn-hover">
                                    <i class="lni lni-plus"></i> Tambah Aset Pertama
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

@push('scripts-bottom')
    {{-- Script untuk Pencarian Card (Disimpan di akhir file) --}}
    <script>
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const asetItems = document.querySelectorAll('.aset-item');

            asetItems.forEach(item => {
                // Mencari di Nama Aset dan Kode Aset
                const namaAset = item.querySelector('.warga-header h5').textContent.toLowerCase();
                const kodeAsetElement = item.querySelector('.warga-header p');
                // Asumsi kode aset selalu ada di dalam elemen p
                const kodeAset = kodeAsetElement ? kodeAsetElement.textContent.toLowerCase() : '';

                if (namaAset.includes(searchTerm) || kodeAset.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
@endpush
