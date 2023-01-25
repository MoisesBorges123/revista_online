<?php

namespace App\Http\Livewire\Admin\Artigo;

use Livewire\Component;

class Artigo extends Component
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
        return view('livewire.admin.artigo.artigo')->layout('layouts.app');
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
