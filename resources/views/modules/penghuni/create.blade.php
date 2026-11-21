@extends('layouts.app')

@section('title', 'Tambah Penghuni Baru')
@section('subtitle', 'Daftarkan data penghuni baru ke dalam sistem KosManage')

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
                    <i class="bi bi-person-plus"></i>
                    <span>Formulir Data Penghuni Baru</span>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('penghuni.store') }}" method="POST">
                        @csrf
                        @include('modules.penghuni._form', ['submitLabel' => 'Simpan Data Penghuni'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

