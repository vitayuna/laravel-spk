<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function kriterias()
    {
        return $this->belongsToMany(Kriteria::class, 'nilai_alternatifs')
                    ->withPivot('nilai')
                    ->withTimestamps();
    }
}
