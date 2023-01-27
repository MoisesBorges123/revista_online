<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaEstudo extends Model
{
    use HasFactory;
    protected $table = 'areas_de_estudos';
    public $fillable = ['nome','icone'];
}
