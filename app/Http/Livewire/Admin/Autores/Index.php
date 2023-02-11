<?php

namespace App\Http\Livewire\Admin\Autores;

use App\Models\Artigo;
use App\Models\Revista;
use Livewire\Component;

class Index extends Component
{
    public $artigo;
    public $listeners = ['list'=>'mount'];
    public $artigo_id;
    public function mount()
    {
        $this->artigo_id;
        $this->artigo = Artigo::find($this->artigo_id);
        
    }
    public function render()
    {
        return view('livewire.admin.autores.index');
    }
    public function delete($id,$nome)
    {
        $this->emit('swal',"Tem certeza que deseja retirar $nome como autor ?",'delete',$id,'deleteAutor');
    }
}
