<?php

namespace App\Http\Controllers;

use App\Models\PenghuniKost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenghuniKostController extends Controller
{
    public function index(Request $request): View
    {
        $totalPenghuni = PenghuniKost::count();
        $totalLunas = PenghuniKost::where('status', 'Lunas')->count();
        $totalBelumLunas = PenghuniKost::where('status', 'Belum lunas')->count();
        $totalMenunggak = PenghuniKost::where('status', 'Nunggak')->count();

        $query = PenghuniKost::query();

        if ($request->filled('cari')) {
            $cari = $request->input('cari');
            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'like', "%{$cari}%")
                    ->orWhere('nik', 'like', "%{$cari}%")
                    ->orWhere('telepon', 'like', "%{$cari}%");
            });
        }

        if ($request->filled('filter_status')) {
            $query->where('status', $request->input('filter_status'));
        }

        $daftarPenghuni = $query->orderBy('id', 'desc')->get();

        return view('modules.penghuni.index', compact(
            'daftarPenghuni',
            'totalBelumLunas',
            'totalLunas',
            'totalPenghuni',
            'totalMenunggak',
        ));
    }

    public function create(): View
    {
        return view('modules.penghuni.create');
    }

    public function store(Request $request): RedirectResponse
    {
        PenghuniKost::create($this->validatedData($request));

        return redirect()
            ->route('penghuni.index')
            ->with('success', 'Data penghuni baru berhasil disimpan!');
    }

    public function show(PenghuniKost $penghuni): RedirectResponse
    {
        return redirect()->route('penghuni.edit', $penghuni);
    }

    public function edit(PenghuniKost $penghuni): View
    {
        return view('modules.penghuni.edit', compact('penghuni'));
    }

    public function update(Request $request, PenghuniKost $penghuni): RedirectResponse
    {
        $penghuni->update($this->validatedData($request));

        return redirect()
            ->route('penghuni.index')
            ->with('success', 'Data penghuni berhasil diperbarui!');
    }

    public function destroy(PenghuniKost $penghuni): RedirectResponse
    {
        $penghuni->delete();

        return redirect()
            ->route('penghuni.index')
            ->with('success', 'Data penghuni berhasil dihapus!');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:50',
            'nik' => 'required|string|max:20',
            'jk' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
            'pekerjaan' => 'nullable|string|max:100',
            'kamar' => 'required|string|max:50',
            'tgl_masuk' => 'required|date',
            'harga' => 'required|numeric|min:0',
            'kontak_darurat' => 'required|string|max:100',
            'status' => 'required|in:Lunas,Belum lunas,Nunggak',
        ]);
    }
}
