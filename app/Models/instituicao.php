<?php

namespace App\Models;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instituicao extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'instituicoes';
    public $fillable = [
        'cnpj',
        'nome_fantasia',
        'site',
        'endereco_id',
        'telefone',
        'email',
        'logo',
        'descricao',
        'missao',
        'visao',
        'valores',
        'objetivos'        
    ];
    
    public function endereco()
    {
        return $this->belongsTo(Endereco::class,'endereco_id','id');
    }
}
