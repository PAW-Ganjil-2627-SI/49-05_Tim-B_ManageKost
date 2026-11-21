@extends('layouts.app')

@section('title', 'Master Kamar')

@section('page-actions')
    <a href="{{ route('kamar.create') }}" class="btn btn-primary">
        + Tambah Kamar
    </a>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header">
        <h5 class="fw-bold mb-1">Data Master Kamar</h5>
        <p class="text-muted mb-0 small">Daftar tipe dan spesifikasi kamar kos</p>
    </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                <caption class="visually-hidden">Daftar data master kamar</caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe Kamar</th>
                            <th>Ukuran Kamar</th>
                            <th>Harga Sewa</th>
                            <th>Fasilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kamar as $item)
                            <tr>
                                <td>{{ $item->{'No'} }}</td>
                                <td>{{ $item->{'Tipe _Kamar'} }}</td>
                                <td>{{ $item->Ukuran_Kamar }}</td>
                                <td>
                                    Rp {{ number_format($item->Harga_sewa, 0, ',', '.') }}
                                </td>
                                <td>{{ $item->Fasilitas }}</td>
                                <td>
                                    <a href="{{ route('kamar.edit', $item->{'No'}) }}"
                                       class="btn btn-outline-dark btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('kamar.destroy', $item->{'No'}) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus kamar ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    Belum ada data kamar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
