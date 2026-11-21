<?php

namespace App\Http\Controllers;

use App\Models\Housekeeper;
use Illuminate\Http\Request;

class HousekeeperController extends Controller
{
    public function index()
    {
        $housekeepers = Housekeeper::latest()->paginate(10);
        return view('modules.housekeeper.index', compact('housekeepers'));
    }

    public function create()
    {
        return view('modules.housekeeper.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:100',
            'no_hp'           => 'required|string|max:20',
            'area_penanganan' => 'required|string|max:255',
            'tugas_harian'    => 'required|string',
        ]);

        Housekeeper::create($validated);

        return redirect()->route('housekeeper.index')
            ->with('success', 'Data housekeeper berhasil ditambahkan.');
    }

    public function edit(Housekeeper $housekeeper)
    {
        return view('modules.housekeeper.edit', compact('housekeeper'));
    }

    public function update(Request $request, Housekeeper $housekeeper)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:100',
            'no_hp'           => 'required|string|max:20',
            'area_penanganan' => 'required|string|max:255',
            'tugas_harian'    => 'required|string',
        ]);

        $housekeeper->update($validated);

        return redirect()->route('housekeeper.index')
            ->with('success', 'Data housekeeper berhasil diperbarui.');
    }

    public function destroy(Housekeeper $housekeeper)
    {
        $housekeeper->delete();

        return redirect()->route('housekeeper.index')
            ->with('success', 'Data housekeeper berhasil dihapus.');
    }
}