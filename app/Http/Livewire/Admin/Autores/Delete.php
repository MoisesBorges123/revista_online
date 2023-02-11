<?php

namespace App\Http\Livewire\Admin\Autores;

use App\Models\Autores;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['deleteAutor'=>'delete'];
    public function render()
    {
        return view('livewire.admin.autores.delete');
    }
    public function delete($id)
    {
        try{
            $autor = Autores::find($id);                       
            $autor->delete();            
            $this->emit('toast','Autor excluido com sucesso!','success');
            $this->emit('list');
        }catch(\Exception $e)
        {

        }
        
    }
}
