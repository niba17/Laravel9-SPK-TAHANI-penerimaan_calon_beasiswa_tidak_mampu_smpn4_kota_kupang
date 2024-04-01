<?php

namespace App\Models;

use App\Models\KriteriaSubKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $guarded = ['id'];

    public function kriteria_sub_kriteria()
    {
        return $this->hasMany(KriteriaSubKriteria::class, 'sub_kriteria_id', 'id');
    }
}
