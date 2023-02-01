<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerMural extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'banners';
    public $fillable = [
        'image','titulo','descricao','acao','nome_acao',
        'link_acao','visivel','publicacao_inicio'
        
    ];
}
