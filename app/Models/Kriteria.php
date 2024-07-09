<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'bobot', 'jenis'];

    public function alternatifs()
    {
        return $this->belongsToMany(Alternatif::class, 'nilai_alternatifs')
                    ->withPivot('nilai')
                    ->withTimestamps();
    }
}
