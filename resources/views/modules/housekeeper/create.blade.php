@extends('layouts.app')
@section('title', 'Tambah Housekeeper')

@section('content')
    <div class="card">
        <div class="card-header">Form Data Housekeeper</div>
        <form action="{{ route('housekeeper.store') }}" method="POST">
            @csrf
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                           class="form-control @error('nama') is-invalid @enderror">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                           class="form-control @error('no_hp') is-invalid @enderror">
                    @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label">Area Penanganan</label>
                    <input type="text" name="area_penanganan" value="{{ old('area_penanganan') }}"
                           class="form-control @error('area_penanganan') is-invalid @enderror">
                    @error('area_penanganan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label">Tugas Harian</label>
                    <textarea name="tugas_harian" rows="4"
                              class="form-control @error('tugas_harian') is-invalid @enderror">{{ old('tugas_harian') }}</textarea>
                    @error('tugas_harian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <a href="{{ route('housekeeper.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection