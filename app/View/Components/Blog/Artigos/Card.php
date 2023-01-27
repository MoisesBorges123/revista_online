<?php

namespace App\View\Components\Blog\Artigos;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ano,$titulo,$volume,$doi,$numero,$datapublicacao,$icone;
    public function __construct($ano,$titulo,$volume,$doi,$numero,$datapublicacao,$icone)
    {
        $this->titulo  = $titulo ?? '';
        $this->ano = !empty($ano) ? "<span><b>Ano: </b>$ano</span>&nbsp;&nbsp;" : '';
        $this->volume = !empty($volume) ? "<span><b>Volume: </b>$volume</span>&nbsp;&nbsp;" : '';
        $this->doi = !empty($doi) ? "<span><b>DOI: </b>$doi</span>&nbsp;&nbsp;" : '';
        $this->numero = !empty($numero) ? "<span><b>Numero: </b>$numero</span>&nbsp;&nbsp;" : '';
        $this->datapublicacao = !empty($datapublicacao) ? "<span><b>Data Publicação: </b>".date('d/m/Y',strtotime($datapublicacao))."</span>" : '';
        $this->icone = count($icone) > 0 ? $icone[0]->icone : '<i class="bi bi-chat-square-text"></i>';
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.artigos.card');
    }
}
