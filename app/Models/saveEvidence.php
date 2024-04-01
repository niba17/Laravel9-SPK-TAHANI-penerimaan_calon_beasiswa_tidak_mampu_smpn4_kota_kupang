<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saveEvidence extends Model
{
    use HasFactory;
    protected $table = 'save_evidence';
    protected $guarded = ['id'];
}