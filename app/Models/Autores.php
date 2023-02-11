<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autores extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'autores';
    public $fillable = ['name','autor_correspondente','email','artigo_id'];
    public function articles()
    {
        return $this->belongsToMany(Artigo::class,'artigos__autores','autor_id','artigo_id');
    }
}
