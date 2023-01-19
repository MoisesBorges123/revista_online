<?php

namespace App\Http\Livewire\Admin\Instituicao;

use Livewire\Component;

class Instituicao extends Component
{
    public $window, $selectedID;
    public function mount()
    {
        $this->setWindow('index');
    }
    public function render()
    {
        
        return view('livewire.admin.instituicao.instituicao')->layout('layouts.app');
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
