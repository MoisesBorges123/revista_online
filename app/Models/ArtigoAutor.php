<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtigoAutor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'artigos__autores';
    public $fillable =['artigo_id','autor_id']
}
