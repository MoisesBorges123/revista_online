<?php

namespace App\Http\Livewire\Admin\Artigo;

use App\Models\Artigo;
use Livewire\Component;

class Show extends Component
{
    public $artigo, $resumo;
    public function mount($id)
    {
        $this->artigo = Artigo::find($id);
        $this->resumo = $this->artigo->resumo_portugues;
    }
    public function render()
    {
        return view('livewire.admin.artigo.show');
    }
    public function delete($id)
    {
        $this->emit('swal','Tem certeza que deseja excluir esse artigo?','delete',$id);
        $this->emit('changePage','index');
    }
    public function alterar($id)
    {
        $this->emit('changePage','edit',$id);
    }
    public function lang($lang){
        switch($lang){
            case 'en':
                $this->resumo = $this->artigo->resumo_ingles;
                break;
            case 'br':
                $this->resumo = $this->artigo->resumo_portugues;
                break;
            case 'es':
                $this->resumo = $this->artigo->resumo_espanhol;
                break;
        }

    }
}
