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
}
