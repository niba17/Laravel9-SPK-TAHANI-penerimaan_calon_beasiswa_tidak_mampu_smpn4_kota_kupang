<?php

namespace App\Models;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pakar extends Model
{
    use HasFactory;
    protected $table = 'pakar';
    protected $guarded = ['id'];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}