<?php

namespace App\Models;

use App\Models\Kasus;
use App\Models\Siswa;
use App\Models\Tingkat;
use App\Models\Kecamatan;
use App\Models\Mahasiswa;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    // public function kecamatan()
    // {
    //     return $this->belongsTo(Kecamatan::class);
    // }

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }
}