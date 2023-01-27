<?php

namespace App\Http\Livewire\Blog\Revistas;

use Livewire\Component;

class Card extends Component
{
    public $titulo, $subtitulo, $instituicao,$img, $icone, $area, $cod;
   
    public function render()
    {
      
        return view('livewire.blog.revistas.card');
    }
}
