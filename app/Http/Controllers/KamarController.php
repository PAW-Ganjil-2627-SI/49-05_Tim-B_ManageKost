<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    // Menampilkan semua data kamar
     public function index()
    {
        $kamar = Kamar::all();

        return view('kamar.index', compact('kamar'));
    }
    // Menampilkan formulir tambah kamar
    public function create()
    {
        return view('kamar.tambah');
    }

    // Menyimpan data kamar baru
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kamar' => 'required|max:50',
            'ukuran_kamar' => 'required|max:50',
            'harga_sewa' => 'required|numeric|min:0',
            'fasilitas' => 'required',
        ]);

        Kamar::create([
            'Tipe _Kamar' => $request->tipe_kamar,
            'Ukuran_Kamar' => $request->ukuran_kamar,
            'Harga_sewa' => $request->harga_sewa,
            'Fasilitas' => $request->fasilitas,
        ]);

        return redirect()->route('kamar.index')
            ->with('success', 'Data kamar berhasil ditambahkan!');
    }

    // Menampilkan formulir edit kamar
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);

        return view('kamar.edit', compact('kamar'));
    }

    // Memperbarui data kamar
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe_kamar' => 'required|max:50',
            'ukuran_kamar' => 'required|max:50',
            'harga_sewa' => 'required|numeric|min:0',
            'fasilitas' => 'required',
        ]);

        $kamar = Kamar::findOrFail($id);

        $kamar->update([
            'Tipe _Kamar' => $request->tipe_kamar,
            'Ukuran_Kamar' => $request->ukuran_kamar,
            'Harga_sewa' => $request->harga_sewa,
            'Fasilitas' => $request->fasilitas,
        ]);

        return redirect()->route('kamar.index')
            ->with('success', 'Data kamar berhasil diperbarui!');
    }

    // Menghapus data kamar
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')
            ->with('success', 'Data kamar berhasil dihapus!');
    }
}
