<?php

namespace App\Http\Livewire\Admin\Configuracoes\AreaEstudo;

use Livewire\Component;

class AreaEstudo extends Component
{
    public $window, $selectedID;
    public $listeners =[
        'changePage'=>'setWindow'        
               
    ];
    public function mount()
    {
        $this->setWindow('index');
    }
    public function render()
    {
        return view('livewire.admin.configuracoes.area-estudo.area-estudo')->layout('layouts.app');
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
