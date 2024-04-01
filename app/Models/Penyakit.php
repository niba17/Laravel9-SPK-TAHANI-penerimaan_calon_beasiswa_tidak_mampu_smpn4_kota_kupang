<?php

namespace App\Models;

use App\Models\Pakar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $guarded = ['id'];

    public function pakar()
    {
        return $this->hasMany(Pakar::class, 'penyakit_id', 'id');
    }
}