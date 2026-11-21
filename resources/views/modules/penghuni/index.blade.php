@extends('layouts.app')

@section('title', 'Data Penghuni')
@section('subtitle', 'Pengelolaan profil penghuni kos, nomor KTP/identitas, pekerjaan, dan kontak darurat')

@section('page-actions')
    <a href="{{ route('penghuni.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle"></i>
        <span>Tambah Penghuni</span>
    </a>
@endsection

@section('content')
    <section class="mb-4">
        <div class="row g-3">
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card d-flex align-items-center justify-content-between gap-3">
                    <div>
                        <div class="text-muted small fw-semibold">Total Penghuni</div>
                        <div class="h3 fw-bold mb-0 mt-1 tabular-nums">{{ $totalPenghuni }}</div>
                    </div>
                    <span class="stat-icon">
                        <i class="bi bi-people"></i>
                    </span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card d-flex align-items-center justify-content-between gap-3">
                    <div>
                        <div class="text-muted small fw-semibold">Status Lunas</div>
                        <div class="h3 fw-bold mb-0 mt-1 tabular-nums">{{ $totalLunas }}</div>
                    </div>
                    <span class="stat-icon" style="background-color: #DCFCE7;">
                        <i class="bi bi-check-circle"></i>
                    </span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card d-flex align-items-center justify-content-between gap-3">
                    <div>
                        <div class="text-muted small fw-semibold">Belum Lunas</div>
                        <div class="h3 fw-bold mb-0 mt-1 tabular-nums">{{ $totalBelumLunas }}</div>
                    </div>
                    <span class="stat-icon" style="background-color: #FEF3C7;">
                        <i class="bi bi-hourglass-split"></i>
                    </span>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card d-flex align-items-center justify-content-between gap-3">
                    <div>
                        <div class="text-muted small fw-semibold">Menunggak</div>
                        <div class="h3 fw-bold mb-0 mt-1 tabular-nums">{{ $totalMenunggak }}</div>
                    </div>
                    <span class="stat-icon" style="background-color: #FEE2E2;">
                        <i class="bi bi-exclamation-triangle"></i>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="card mb-4">
        <div class="card-header d-flex align-items-center gap-2">
            <i class="bi bi-funnel"></i>
            <span>Cari dan Filter Penghuni</span>
        </div>
        <div class="card-body">
            <form action="{{ route('penghuni.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label for="cari" class="form-label">Pencarian</label>
                    <input type="text"
                           class="form-control"
                           id="cari"
                           name="cari"
                           value="{{ request('cari') }}"
                           placeholder="Cari nama, NIK, atau nomor HP...">
                </div>
                <div class="col-md-4">
                    <label for="filter_status" class="form-label">Status Sewa</label>
                    <select class="form-select" id="filter_status" name="filter_status">
                        <option value="">Semua Status</option>
                        <option value="Lunas" {{ request('filter_status') === 'Lunas' ? 'selected' : '' }}>Lunas</option>
                        <option value="Belum lunas" {{ request('filter_status') === 'Belum lunas' ? 'selected' : '' }}>Belum lunas</option>
                        <option value="Nunggak" {{ request('filter_status') === 'Nunggak' ? 'selected' : '' }}>Nunggak</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i>
                        <span>Cari</span>
                    </button>
                    <a href="{{ route('penghuni.index') }}" class="btn btn-secondary" title="Reset filter">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                </div>
            </form>
        </div>
    </section>

    <section class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center gap-2">
                <i class="bi bi-table"></i>
                <span>Daftar Penghuni Kos</span>
            </span>
            <span class="badge text-bg-primary tabular-nums">{{ count($daftarPenghuni) }} Data</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" style="width: 56px;">No</th>
                        <th scope="col">Nama &amp; NIK</th>
                        <th scope="col">Gender</th>
                        <th scope="col">No. HP / WA</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Kamar Kos</th>
                        <th scope="col">Tgl Masuk</th>
                        <th scope="col">Biaya / Bulan</th>
                        <th scope="col">Kontak Darurat</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($daftarPenghuni as $index => $penghuni)
                        <tr>
                            <td class="text-center fw-bold text-muted tabular-nums">{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-bold">{{ $penghuni->nama }}</div>
                                <small class="text-muted tabular-nums">{{ $penghuni->nik }}</small>
                            </td>
                            <td>
                                @if ($penghuni->jk === 'Laki-laki' || $penghuni->jk === 'Laki laki')
                                    <span class="badge text-bg-info">Laki-laki</span>
                                @else
                                    <span class="badge text-bg-secondary">Perempuan</span>
                                @endif
                            </td>
                            <td class="tabular-nums">{{ $penghuni->telepon }}</td>
                            <td><span class="small">{{ $penghuni->pekerjaan ?? '-' }}</span></td>
                            <td>
                                <span class="badge text-bg-secondary">{{ $penghuni->kamar }}</span>
                            </td>
                            <td class="tabular-nums">
                                {{ $penghuni->tgl_masuk ? \Carbon\Carbon::parse($penghuni->tgl_masuk)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="fw-semibold tabular-nums">Rp {{ number_format((int) $penghuni->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="small text-muted">{{ $penghuni->kontak_darurat }}</span>
                            </td>
                            <td class="text-center">
                                @if ($penghuni->status === 'Lunas')
                                    <span class="badge text-bg-success">Lunas</span>
                                @elseif ($penghuni->status === 'Belum lunas')
                                    <span class="badge text-bg-warning">Belum lunas</span>
                                @else
                                    <span class="badge text-bg-danger">Nunggak</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('penghuni.edit', $penghuni) }}" class="btn btn-sm btn-warning" title="Edit Data">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if (Auth::user()->hasRole('admin'))
                                        <form action="{{ route('penghuni.destroy', $penghuni) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data penghuni {{ $penghuni->nama }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Tidak ada data penghuni kos yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection

