<?php

namespace App\Models;

use App\Models\Kasus;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Kelurahan;
use App\Models\Mahasiswa;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tingkat extends Model
{
    use HasFactory;
    protected $table = 'tingkat';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'tingkat_id', 'id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'tingkat_id', 'id');
    }
}