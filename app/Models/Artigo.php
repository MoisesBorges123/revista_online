<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Artigo extends Model
{
    use HasFactory;
  
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
                        'inicio_publicacao',
                        'resumo_portugues',
                        'resumo_espanhol',
                        'resumo_ingles'
                    ];
    public function revista()
    {
        return $this->belongsTo(Revista::class,'revista_id','id');
    }
    public function autores()
    {
        return $this->belongsToMany(Autores::class,'artigos__autores','artigo_id','autor_id');
    }
}
