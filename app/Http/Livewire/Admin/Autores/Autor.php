<?php

namespace App\Http\Livewire\Admin\Autores;

use App\Models\Revista;
use Livewire\Component;

class Autor extends Component
{
    public $artigo;
    public function render()
    {
        return view('livewire.admin.autores.autor');
    }
    
}
