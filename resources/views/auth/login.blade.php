@extends('layouts.guest')

@section('title', 'Masuk')

@section('content')
<div class="card">
    <div class="row g-0">
        <div class="col-lg-5 login-brand-panel p-4 p-lg-5 d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex align-items-center gap-2 mb-4">
                    <span class="bg-white border border-2 border-dark rounded-2 d-inline-flex align-items-center justify-content-center fw-bold"
                          style="width: 42px; height: 42px; box-shadow: 2px 2px 0 #18181B;">
                        KM
                    </span>
                    <div>
                  <div class="fw-bold lh-sm">KosManage</div>
                        <div class="small" style="opacity: 0.8;">Manajemen Kos &amp; Properti</div>
                    </div>
                </div>

                <h1 class="h3 fw-bold mb-3">Sistem Manajemen Kos &amp; Properti</h1>
                <p class="mb-4" style="font-size: 0.92rem;">
                    Panel operasional terpadu untuk mengelola kamar, data penghuni, jadwal kebersihan staff, serta inventaris aset properti.
                </p>
            </div>

            <div class="bg-white border border-2 border-dark rounded-2 p-3" style="box-shadow: 2px 2px 0 #18181B;">
                <div class="fw-bold small text-uppercase mb-2" style="letter-spacing: 0.05em;">Layanan Pengelolaan</div>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge text-bg-light">Master Kamar</span>
                    <span class="badge text-bg-light">Data Penghuni</span>
                    <span class="badge text-bg-light">Housekeeper</span>
                    <span class="badge text-bg-light">Inventaris Aset</span>
                </div>
            </div>
        </div>

        <div class="col-lg-7 p-4 p-lg-5 bg-white d-flex flex-column justify-content-center">
            <div class="mb-4">
                <h2 class="h4 fw-bold mb-1">Selamat Datang Kembali</h2>
                <p class="text-muted small mb-0">Silakan masuk menggunakan akun pengelola atau staff kos.</p>
            </div>

            @include('layouts.partials.alerts')

            <div class="alert alert-info small py-2 mb-3">
                <div class="fw-bold mb-1"><i class="bi bi-info-circle me-1"></i> Akun Demo (Password: <code>password123</code>)</div>
                <div>Admin: <code>admin@kosmanage.id</code> &middot; Operator: <code>operator@kosmanage.id</code></div>
            </div>

            <form action="{{ route('login.post') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email</label>
                    <input type="email"
                           id="loginEmail"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="nama@kosmanage.id"
                           required
                           autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label for="loginPassword" class="form-label mb-0">Kata Sandi</label>
                    </div>
                    <div class="input-group">
                        <input type="password"
                               id="loginPassword"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan kata sandi"
                               required>
                        <button type="button"
                                class="btn btn-secondary"
                                data-toggle-password="#loginPassword"
                                aria-label="Tampilkan atau sembunyikan kata sandi">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" value="1">
                        <label class="form-check-label small" for="rememberMe">
                            Ingat saya di perangkat ini
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Masuk ke Sistem</span>
                </button>
            </form>

            <div class="mt-4 pt-3 border-top border-2 border-dark text-center small">
                Belum punya akun?
                <a href="{{ route('register') }}" class="fw-bold text-decoration-underline">Daftar Akun Baru</a>
            </div>
        </div>
    </div>
</div>
@endsection
