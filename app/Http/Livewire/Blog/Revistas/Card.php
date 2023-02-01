<?php

namespace App\Http\Livewire\Blog\Revistas;

use Livewire\Component;

class Card extends Component
{
    public $titulo, $subtitulo, $instituicao,$img, $icone, $area, $cod, $areaID;
   
    public function mount()
    {
       // $this->areaClass=strtolower(str_replace(' ','_',preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($this->area)))));
        
    }
    public function render()
    {
      
        return view('livewire.blog.revistas.card');
    }
}
