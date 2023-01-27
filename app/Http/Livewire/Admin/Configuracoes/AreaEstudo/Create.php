<?php

namespace App\Http\Livewire\Admin\Configuracoes\AreaEstudo;

use App\Models\AreaEstudo;
use Livewire\Component;

class Create extends Component
{
    public $nome, $icone;
    public function render()
    {
        return view('livewire.admin.configuracoes.area-estudo.create');
    }
    protected $rules=[
        'nome'=>'required',
        'icone'=>'required',
    ];
    public function store()
    {
        try
        {
            $this->validate();
            AreaEstudo::create([
                'nome'=>$this->nome,
                'icone'=>$this->icone
            ]);
            $this->emit('toast','Cadastrado com sucesso!','success');
            $this->emit('changePage','index');
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
}
