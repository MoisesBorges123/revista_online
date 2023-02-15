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
        if(auth()->user()->perfi_id ==3)
        {
            $instituicoes=[];
        foreach(auth()->user()->instituicoes as $instituicao)
        {
            array_push($instituicoes,$instituicao->id);
        }
            $this->revista=Revista::whereIn('instituicoe_id',$instituicoes)->get();
        }else
        {
            $this->revista=Revista::get();
        }
        
        
        
    }
    public function render()
    {
        return view('livewire.admin.artigo.create');
    }
    public function store()
    {
        $this->validate();
        try
        {
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
            $this->emit('toast','Artigo cadastrado com sucesso!','success');
            $this->emit('changePage','cadAutores',$artigo->id);
            $this->emit('top');
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }

}
