@extends('layouts.guest')

@section('title', 'Daftar Akun')

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
                    Daftarkan akun operator untuk mulai mengelola data penghuni kos dalam satu panel terpadu.
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
                <h2 class="h4 fw-bold mb-1">Buat Akun Baru</h2>
                <p class="text-muted small mb-0">Lengkapi formulir di bawah untuk mendaftar sebagai operator.</p>
            </div>

            @include('layouts.partials.alerts')

            <form action="{{ route('register.post') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="registerName" class="form-label">Nama Lengkap</label>
                    <input type="text"
                           id="registerName"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Contoh: Budi Santoso"
                           required
                           autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email</label>
                    <input type="email"
                           id="registerEmail"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="nama@kosmanage.id"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <input type="password"
                               id="registerPassword"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Minimal 6 karakter"
                               required>
                        <button type="button"
                                class="btn btn-secondary"
                                data-toggle-password="#registerPassword"
                                aria-label="Tampilkan atau sembunyikan kata sandi">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="registerPasswordConfirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input type="password"
                               id="registerPasswordConfirmation"
                               name="password_confirmation"
                               class="form-control"
                               placeholder="Ketik ulang kata sandi"
                               required>
                        <button type="button"
                                class="btn btn-secondary"
                                data-toggle-password="#registerPasswordConfirmation"
                                aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    <i class="bi bi-person-check"></i>
                    <span>Daftar Akun</span>
                </button>
            </form>

            <div class="mt-4 pt-3 border-top border-2 border-dark text-center small">
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="fw-bold text-decoration-underline">Masuk di sini</a>
            </div>
        </div>
    </div>
</div>
@endsection
