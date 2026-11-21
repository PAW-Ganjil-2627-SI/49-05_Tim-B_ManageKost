@extends('layouts.guest')

@section('title', '403 — Akses Ditolak')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card">
                <div class="card-header d-flex align-items-center gap-2">
                    <span class="brand-mark" style="width: 30px; height: 30px; font-size: 0.85rem;">KM</span>
                    <span>KosManage — Akses Dibatasi</span>
                </div>
                <div class="card-body p-4 p-lg-5 text-center">
                    <div class="display-3 fw-bold mb-2">403</div>
                    <h1 class="h4 fw-bold mb-3">Akses Ditolak</h1>
                    <p class="text-muted mb-4">
                        {{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses.' }}
                    </p>
                    <a href="{{ Auth::check() ? route('dashboard') : route('login') }}" class="btn btn-primary px-4">
                        <i class="bi bi-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
