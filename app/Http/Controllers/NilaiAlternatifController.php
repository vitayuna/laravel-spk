<?php
namespace App\Http\Controllers;

use App\Models\NilaiAlternatif;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class NilaiAlternatifController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'nilai.*' => 'required|numeric',
        ]);

        foreach ($request->nilai as $kriteriaId => $nilai) {
            NilaiAlternatif::updateOrCreate(
                ['alternatif_id' => $request->alternatif_id, 'kriteria_id' => $kriteriaId],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('alternatif.index')->with('success', 'Nilai alternatif berhasil disimpan.');
    }
}
