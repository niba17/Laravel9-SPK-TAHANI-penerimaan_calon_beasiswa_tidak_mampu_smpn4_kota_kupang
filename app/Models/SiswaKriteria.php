<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaKriteria extends Model
{
    use HasFactory;

    protected $table = 'siswa_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
