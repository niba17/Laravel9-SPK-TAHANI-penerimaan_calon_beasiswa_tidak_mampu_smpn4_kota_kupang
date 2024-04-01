<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saveHipotesa extends Model
{
    use HasFactory;
    protected $table = 'save_hipotesa';
    protected $guarded = ['id'];
}