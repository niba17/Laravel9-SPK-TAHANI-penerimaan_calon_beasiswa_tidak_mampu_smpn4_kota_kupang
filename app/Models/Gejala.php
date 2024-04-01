<?php

namespace App\Models;

use App\Models\Pakar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $guarded = ['id'];

    public function pakar()
    {
        return $this->hasMany(Pakar::class, 'gejala_id', 'id');
    }
}