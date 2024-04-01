<?php

namespace App\Models;

use App\Models\Kasus;
use App\Models\Siswa;
use App\Models\Kelurahan;
use App\Models\Mahasiswa;
use App\Models\Puskesmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $guarded = ['id'];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kecamatan_id', 'id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kecamatan_id', 'id');
    }
}