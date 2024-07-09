<?php
namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Illuminate\Http\Request;


class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        return view('alternatif.index', compact('alternatifs', 'kriterias'));
    }

    public function storeWithNilai(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nilai.*' => 'required|numeric|between:0,999999.9999',
        ]);

        $alternatif = Alternatif::create(['nama' => $request->nama]);

        foreach ($request->nilai as $kriteriaId => $nilai) {
            NilaiAlternatif::create([
                'alternatif_id' => $alternatif->id,
                'kriteria_id' => $kriteriaId,
                'nilai' => $nilai,
            ]);
        }

        return redirect()->route('alternatif.index')->with('success', 'Alternatif dan nilai berhasil ditambahkan.');
    }

    public function edit(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        return view('alternatif.edit', compact('alternatif', 'kriterias'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nilai.*' => 'required|numeric|between:0,999999.9999',
        ]);

        $alternatif->update(['nama' => $request->nama]);

        foreach ($request->nilai as $kriteriaId => $nilai) {
            NilaiAlternatif::updateOrCreate(
                ['alternatif_id' => $alternatif->id, 'kriteria_id' => $kriteriaId],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('alternatif.index')->with('success', 'Alternatif dan nilai berhasil diperbarui.');
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus.');
    }
}

