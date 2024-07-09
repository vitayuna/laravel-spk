<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class TOPSISController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::with('kriterias')->get();

        // Matriks keputusan
        $matrix = [];
        foreach ($alternatifs as $alt) {
            $row = [];
            foreach ($kriterias as $kriteria) {
                $row[] = $alt->kriterias()->where('kriteria_id', $kriteria->id)->first()->pivot->nilai ?? 0;
            }
            $matrix[$alt->nama] = $row;
        }

        // Matriks normalisasi
        $normalized = [];
        $pembagi = [];
        foreach ($kriterias as $index => $kriteria) {
            $pembagi[$index] = sqrt(array_sum(array_map(function ($nilai) use ($index) {
                return pow($nilai[$index], 2);
            }, $matrix)));
        }

        foreach ($matrix as $altName => $row) {
            $normalizedRow = [];
            foreach ($row as $index => $nilai) {
                $normalizedRow[] = $nilai / $pembagi[$index];
            }
            $normalized[$altName] = $normalizedRow;
        }

        // Normalisasi terbobot
        $weighted = [];
        foreach ($normalized as $altName => $row) {
            $weightedRow = [];
            foreach ($row as $index => $nilai) {
                $weightedRow[] = $nilai * $kriterias[$index]->bobot;
            }
            $weighted[$altName] = $weightedRow;
        }

        // Tentukan solusi ideal positif dan negatif
        $idealPositif = [];
        $idealNegatif = [];
        foreach ($kriterias as $index => $kriteria) {
            if ($kriteria->jenis === 'benefit') {
                $idealPositif[$index] = max(array_column($weighted, $index));
                $idealNegatif[$index] = min(array_column($weighted, $index));
            } else {
                $idealPositif[$index] = min(array_column($weighted, $index));
                $idealNegatif[$index] = max(array_column($weighted, $index));
            }
        }

        // Hitung jarak alternatif terhadap solusi ideal positif dan negatif
        $jarakPositif = [];
        $jarakNegatif = [];
        foreach ($weighted as $altName => $row) {
            $jarakPositif[$altName] = sqrt(array_sum(array_map(function ($nilai, $index) use ($idealPositif) {
                return pow($nilai - $idealPositif[$index], 2);
            }, $row, array_keys($row))));
            
            $jarakNegatif[$altName] = sqrt(array_sum(array_map(function ($nilai, $index) use ($idealNegatif) {
                return pow($nilai - $idealNegatif[$index], 2);
            }, $row, array_keys($row))));
        }

        // Hitung skor preferensi
        $results = [];
        foreach ($weighted as $altName => $row) {
            $results[$altName] = $jarakNegatif[$altName] / ($jarakPositif[$altName] + $jarakNegatif[$altName]);
        }

        // Urutkan alternatif berdasarkan skor preferensi
        arsort($results);

        // Tambahkan ranking
        $rankedResults = [];
        $rank = 1;
        foreach ($results as $altName => $score) {
            $rankedResults[] = [
                'nama' => $altName,
                'skor' => $score,
                'rank' => $rank++
            ];
        }

        return view('rank', compact('kriterias', 'matrix', 'normalized', 'weighted', 'rankedResults'));
    }
}
