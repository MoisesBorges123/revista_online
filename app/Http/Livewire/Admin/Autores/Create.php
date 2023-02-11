<?php

namespace App\Http\Livewire\Admin\Autores;

use App\Models\Autores;
use Livewire\Component;

class Create extends Component
{
    public $artigo_id, $nome, $email, $autor_correspondente=[];
    public function mount($id){
     $this->artigo_id = $id;   
    }
    protected $rules=[
        'nome'=>'required',
        'email'=>'required',        
    ];
    public function render()
    {
        return view('livewire.admin.autores.create');
    }
    public function store()
    {
        $this->validate();
        try
        {
            
            $autor = Autores::create([
                'name'=>$this->nome,
                'email'=>$this->email,
                'autor_correspondente'=>empty($this->autor_correspondente[0]) ? false : true
            ]);
            $autor->articles()->attach($this->artigo_id);
            $this->emit('toast','Autor adicionado com sucesso.','success');
            $this->emit('list');     
            $this->clear();       
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
    public function clear(){
        $this->nome = '';
        $this->email ='';
    }

}
