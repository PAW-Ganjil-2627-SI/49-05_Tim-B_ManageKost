
@extends('layouts.app')

@section('title', 'Edit Kamar')

@section('content')

<div class="card mt-3">
    <div class="card-header">
    <h5 class="fw-bold mb-1">Edit Data Kamar</h5>
    <p class="text-muted small mb-0">Ubah informasi kamar kos sesuai kebutuhan.</p>
</div>

    <div class="card-body p-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kamar.update', $kamar->{'No'}) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tipe Kamar</label>
                <input type="text"
                       name="tipe_kamar"
                       class="form-control"
                       value="{{ old('tipe_kamar', $kamar->{'Tipe _Kamar'}) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ukuran Kamar</label>
                <input type="text"
                       name="ukuran_kamar"
                       class="form-control"
                       value="{{ old('ukuran_kamar', $kamar->Ukuran_Kamar) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Sewa</label>
                <input type="number"
                       name="harga_sewa"
                       class="form-control"
                       value="{{ old('harga_sewa', $kamar->Harga_sewa) }}"
                       min="0"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fasilitas</label>
                <textarea name="fasilitas"
                          class="form-control"
                          rows="3"
                          required>{{ old('fasilitas', $kamar->Fasilitas) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('kamar.index') }}"
               class="btn btn-outline-dark">
                Kembali
            </a>
        </form>

    </div>
</div>

@endsection
