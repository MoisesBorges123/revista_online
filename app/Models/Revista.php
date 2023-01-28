<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revista extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'revistas';
    public $fillable = [
        'instituicoe_id',
        'titulo',
        'subtitulo',
        'issn',
        'inicio_publicacao',
        'periodicidade',
        'editor_responsavel',
        'qualis',
        'capa',
        'visivel'
    ];
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class,'instituicoe_id','id');
    }
    public function areas_conhecimentos()
    {
        return $this->belongsToMany(AreaEstudo::class,'revistas__areas_de_estudos','revista_id','areas_de_estudo_id');
    }
    public function artigos()
    {
        return $this->hasMany(Artigo::class,'revista_id','id');
    }
}
