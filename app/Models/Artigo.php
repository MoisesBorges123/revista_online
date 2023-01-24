<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artigo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'artigos';
    public $fillable = [
                        'titulo',
                        'revista_id',
                        'ano',
                        'volume',
                        'doi',
                        'arquivo',
                        'link_externo',
                        'palavra_chave',
                        'numero',
                        'resumo_portugues',
                        'resumo_espanhol',
                        'resumo_ingles'
                    ];
    public function revista()
    {
        return $this->belongsTo(Revista::class,'revista_id','id');
    }
}
