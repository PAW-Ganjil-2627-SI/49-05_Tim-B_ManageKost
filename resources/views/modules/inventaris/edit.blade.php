@extends('layouts.app')

@section('title', 'Edit Inventaris Aset')

@section('content')
<div class="card">
    <div class="card-header">Form Edit Inventaris</div>
    <form action="{{ route('inventaris.update', ['inventari' => $inventaris->getKey()]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body row g-3">
            <div class="col-md-4">
                <label class="form-label">Barang</label>
                <input type="text" name="Barang" value="{{ old('Barang', $inventaris->Barang) }}"
                    class="form-control @error('Barang') is-invalid @enderror">
                @error('Barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Merek</label>
                <input type="text" name="Merek" value="{{ old('Merek', $inventaris->Merek) }}"
                    class="form-control @error('Merek') is-invalid @enderror">
                @error('Merek')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Kondisi</label>
                <input type="text" name="Kondisi" value="{{ old('Kondisi', $inventaris->Kondisi) }}"
                    class="form-control @error('Kondisi') is-invalid @enderror">
                @error('Kondisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
</div>
@endsection