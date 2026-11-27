
@extends('layouts.app')

@section('title', 'Tambah Kamar')

@section('content')

<div class="card mt-3">
    <div class="card-header">
    <h5 class="fw-bold mb-1">Tambah Data Kamar</h5>
    <p class="text-muted small mb-0">Masukkan informasi kamar kos yang baru.</p>
</div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kamar.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tipe Kamar</label>
                <input type="text"
                       name="tipe_kamar"
                       class="form-control"
                       value="{{ old('tipe_kamar') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ukuran Kamar</label>
                <input type="text"
                       name="ukuran_kamar"
                       class="form-control"
                       value="{{ old('ukuran_kamar') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Sewa</label>
                <input type="number"
                       name="harga_sewa"
                       class="form-control"
                       min="0"
                       value="{{ old('harga_sewa') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fasilitas</label>
                <textarea name="fasilitas"
                          class="form-control"
                          rows="3"
                          required>{{ old('fasilitas') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('kamar.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </form>

    </div>
</div>

@endsection
