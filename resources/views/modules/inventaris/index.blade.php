@extends('layouts.app')

@section('title', 'Inventaris Aset')

@section('page-actions')
    <a href="{{ route('inventaris.create') }}" class="btn btn-primary btn-sm">+ Tambah Aset</a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">Daftar Inventaris Aset</div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Merek</th>
                    <th>Kondisi</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inventaris as $item)
                    <tr>
                        <td class="fw-bold">{{ $item->Barang }}</td>
                        <td>{{ $item->Merek }}</td>
                        <td>{{ $item->Kondisi }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('inventaris.edit', ['inventari' => $item->getKey()]) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('inventaris.destroy', ['inventari' => $item->getKey()]) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection