@extends('layouts.app')
@section('title', 'Housekeeper / Staff')

@section('page-actions')
    <a href="{{ route('housekeeper.create') }}" class="btn btn-primary btn-sm">+ Tambah Housekeeper</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">Daftar Housekeeper</div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Area Penanganan</th>
                        <th>Tugas Harian</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($housekeepers as $hk)
                        <tr>
                            <td class="fw-bold">{{ $hk->nama }}</td>
                            <td>{{ $hk->no_hp }}</td>
                            <td>{{ $hk->area_penanganan }}</td>
                            <td>{{ Str::limit($hk->tugas_harian, 60) }}</td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('housekeeper.edit', $hk) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('housekeeper.destroy', $hk) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{ $housekeepers->links() }}</div>
    </div>
@endsection