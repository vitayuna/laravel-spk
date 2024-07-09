<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kriteria::create(['nama' => 'IPK', 'bobot' => 0.4, 'jenis' => 'benefit']);
        Kriteria::create(['nama' => 'Penghasilan Orang Tua', 'bobot' => 0.3, 'jenis' => 'cost']);
        Kriteria::create(['nama' => 'Prestasi', 'bobot' => 0.3, 'jenis' => 'benefit']);
    }
}
