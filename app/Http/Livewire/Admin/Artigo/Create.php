<?php

namespace App\Http\Livewire\Admin\Artigo;

use App\Models\Artigo;
use App\Models\Autores;
use App\Models\Revista;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $titulo, $revista_id,$ano,$volume,$doi,$arquivo,$link_externo,$palavra_chave,$numero,$resumo_portugues,$resumo_espanhol,$resumo_ingles;    
    public $revista, $autor_correspondente, $email_autor_correspondente, $inicio_publicacao;
    protected $rules = [
                        'titulo'=>'required|min:5|unique:artigos,titulo',
                        'revista_id'=>'required',
                        'ano'=>'required',
                        'volume'=>'required',
                        'doi'=>'unique:artigos,doi',                        
                        'link_externo'=>'required',
                        'palavra_chave'=>'required',
                        'numero'=>'required',
                        'resumo_portugues'=>'required|min:10',
                        'resumo_espanhol'=>'required|min:10',
                        'resumo_ingles'=>'required|min:10',
                        'inicio_publicacao'=>'required'
                    ];
    public function mount()
    {
        $this->revista=Revista::get();
        
    }
    public function render()
    {
        return view('livewire.admin.artigo.create');
    }
    public function store()
    {
        try
        {
            $this->validate();
            $artigo = Artigo::create([
                'titulo'=>$this->titulo,
                'revista_id'=>$this->revista_id,                
                'ano'=>$this->ano,
                'volume'=>$this->volume,
                'doi'=>$this->doi,
                'arquivo'=>$this->arquivo,
                'link_externo'=>$this->link_externo,
                'palavra_chave'=>$this->palavra_chave,
                'numero'=>$this->numero,
                'resumo_portugues'=>$this->resumo_portugues,
                'resumo_espanhol'=>$this->resumo_espanhol,
                'resumo_ingles'=>$this->resumo_ingles,
                'inicio_publicacao'=>$this->inicio_publicacao
            ]);

            $autor = Autores::create([
                'name'=>$this->autor_correspondente,
                'autor_correspondete'=>true,
                'email'=>$this->email_autor_correspondente,                
            ]);
            $autor->articles()->attach($artigo->id);
            $this->emit('toast','Artigo cadastrado com sucesso!','success');
            $this->emit('changePage','index');
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }

}
