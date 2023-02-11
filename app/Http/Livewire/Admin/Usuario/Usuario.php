<?php

namespace App\Http\Livewire\Admin\Usuario;

use Livewire\Component;

class Usuario extends Component
{
    public $window, $selectedID;
    public $listeners =[
        'changeInstituicaoPage'=>'setWindow'        
               
    ];
    public function mount()
    {
        $this->setWindow('index');
    }
    public function render()
    {
        return view('livewire.admin.usuario.usuario')->layout('layouts.app');
    }
    public function setWindow($text,$id = null)
    {
        
        $this->window = $text;
        if($id)
        {
            $this->setSelectID($id);
        }
    }
    private function setSelectID($id)
    {
        $this->selectedID = $id;
    }
}
