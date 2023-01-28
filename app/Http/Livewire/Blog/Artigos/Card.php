<?php

namespace App\Http\Livewire\Blog\Artigos;

use Livewire\Component;

class Card extends Component
{
    public $ano,$titulo,$volume,$doi,$numero,$datapublicacao,$icone;
    public function mount($ano,$titulo,$volume,$doi,$numero,$datapublicacao,$icone)
    {
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
}
