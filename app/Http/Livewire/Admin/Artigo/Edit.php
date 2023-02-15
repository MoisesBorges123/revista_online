<?php

namespace App\Http\Livewire\Admin\Artigo;
use App\Models\Artigo;
use App\Models\Autores;
use App\Models\Revista;
use Livewire\Component;

class Edit extends Component
{
    public $titulo, $revista_id,$ano,$volume,$doi,$arquivo,$link_externo,
    $palavra_chave,$numero,$resumo_portugues,$resumo_espanhol,$resumo_ingles;    
    public $autor,$artigo,$revista, $inicio_publicacao;
    
    protected $rules = [
                        'titulo'=>'required|min:5',
                        'revista_id'=>'required',
                        'ano'=>'required',
                        'volume'=>'required',
                        'doi'=>'required',                        
                        'link_externo'=>'required',
                        'palavra_chave'=>'required',
                        'numero'=>'required',
                        'resumo_portugues'=>'required|min:10',
                        'resumo_espanhol'=>'required|min:10',
                        'resumo_ingles'=>'required|min:10',
                        'inicio_publicacao'=>'required'
                    ];
    public function mount($id)
    {
        
        $this->revista=Revista::get();
        $this->artigo = Artigo::find($id);
        $this->titulo = $this->artigo->titulo;
        $this->revista_id = $this->artigo->revista_id;
        $this->ano = $this->artigo->ano;
        $this->volume = $this->artigo->volume;
        $this->doi  = $this->artigo->doi;
        $this->link_externo = $this->artigo->link_externo;
        $this->palavra_chave = $this->artigo->palavra_chave;
        $this->numero = $this->artigo->numero;
        $this->resumo_portugues = $this->artigo->resumo_portugues;
        $this->resumo_espanhol = $this->artigo->resumo_espanhol;
        $this->resumo_ingles = $this->artigo->resumo_ingles;
        $this->inicio_publicacao = $this->artigo->inicio_publicacao;
     
    }
    public function render()
    {
        return view('livewire.admin.artigo.edit');
    }
   
    public function update()
    {
        try
        {
            $this->validate();
            $this->artigo->update([
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
            
            $this->emit('toast','Artigo alterado com sucesso!','success');
            $this->emit('changePage','cadAutores',$this->artigo->id);
            $this->emit('top');      
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
}
