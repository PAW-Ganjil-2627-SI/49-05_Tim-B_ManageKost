@extends('layouts.app')

@section('title', 'Edit Data Penghuni')
@section('subtitle', 'Perbarui informasi data penyewa kos yang sudah terdaftar')

@section('page-actions')
    <a href="{{ route('penghuni.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali ke Daftar</span>
    </a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi bi-pencil-square"></i>
                    <span>Formulir Perubahan Data: {{ $penghuni->nama }}</span>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('penghuni.update', $penghuni) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('modules.penghuni._form', ['submitLabel' => 'Simpan Perubahan'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

