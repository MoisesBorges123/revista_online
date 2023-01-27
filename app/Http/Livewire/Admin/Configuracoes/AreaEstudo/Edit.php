<?php

namespace App\Http\Livewire\Admin\Configuracoes\AreaEstudo;

use App\Models\AreaEstudo;
use Livewire\Component;

class Edit extends Component
{
    public $nome,$icone,$areaEstudo;
    public function mount($id)
    {
        $this->areaEstudo = AreaEstudo::find($id);
        $this->nome = $this->areaEstudo->nome;
        $this->icone = $this->areaEstudo->icone;
    }
    public function render()
    {
        
        return view('livewire.admin.configuracoes.area-estudo.edit');
    }
    protected $rules=[
        'nome'=>'required',
        'icone'=>'required',
    ];
    public function update()
    {
        try
        {
            $this->validate();
            $this->areaEstudo->update([
                'nome'=>$this->nome,
                'icone'=>$this->icone
            ]);
            $this->emit('toast','Alterado com sucesso!','success');
            $this->emit('changePage','index');
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
}
