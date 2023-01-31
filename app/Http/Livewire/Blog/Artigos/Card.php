<?php

namespace App\Http\Livewire\Blog\Artigos;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Card extends Component
{
    public $autor,$lang, $ano,$titulo,$volume,$doi,$numero,$datapublicacao,$icone, $cod, $resumeportugues, $resumeingles, $resumespanhol,$revista,$linkexterno, $autorcorrespondente;
    public function mount($ano,$titulo,$volume,$doi,$numero,$datapublicacao,$icone)
    {
        $this->autor = $this->autorcorrespondente->where('autor_correspondete',1);        
        $this->autor = !empty($this->autor[0]) ? "<div><span><b>Autor: </b> ".$this->autor[0]->name."</span></div>" : '';
        $this->titulo  = $titulo ?? '';
        $this->ano = !empty($ano) ? "<span><b>Ano: </b>$ano</span>&nbsp;&nbsp;" : '';
        $this->volume = !empty($volume) ? "<span><b>Volume: </b>$volume</span>&nbsp;&nbsp;" : '';
        $this->doi = !empty($doi) ? "<span><b>DOI: </b>$doi</span>&nbsp;&nbsp;" : '';
        $this->numero = !empty($numero) ? "<span><b>Numero: </b>$numero</span>&nbsp;&nbsp;" : '';
        $this->datapublicacao = !empty($datapublicacao) ? "<span><b>Data Publicação: </b>".date('d/m/Y',strtotime($datapublicacao))."</span>" : '';
        $this->icone = count($icone) > 0 ? $icone[0]->icone : '<i class="bi bi-chat-square-text"></i>';
        
    }
    public function render()
    {
        return view('livewire.blog.artigos.card');
    }
    public function lang($lang,$cod)
    {
        $this->lang = $lang;
        $this->emit('collapse','article',$cod);
    }
}
