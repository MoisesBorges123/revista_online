<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\Revista;
use Livewire\Component;

class Show extends Component
{
    public $revista;
    public function mount($id)
    {
        $this->revista = Revista::find($id);
        
    }
    public function render()
    {
        return view('livewire.admin.revista.show');
    }
    public function delete($id)
    {
        $this->emit('swal','Tem certeza que deseja excluir essa revista?','delete',$id);
        $this->emit('changePage','index');
    }
    public function alterar($id)
    {
        $this->emit('changePage','edit',$id);
    }
}
