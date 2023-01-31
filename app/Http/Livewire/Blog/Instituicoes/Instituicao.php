<?php

namespace App\Http\Livewire\Blog\Instituicoes;

use App\Models\Instituicao as ModelsInstituicao;
use Livewire\Component;
use App\Models\Instituicooe;

class Instituicao extends Component
{
    public $instituicoes;
    public function mount()
    {
        $this->instituicoes  = ModelsInstituicao::get();
    }
    public function render()
    {
        return view('livewire.blog.instituicoes.instituicao');
    }
}
