<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\Instituicao;
use App\Models\Revista;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    use WithFileUploads;
    public $revista, $instituicao_id, $titulo, $subtitulo, $issn, $inicio_publicacao, $periodicidade, $qualis, $capa, $visivel, $instituicao, $editor_responsavel;
    protected $rules = [
        'instituicao_id'=>'required',
        'titulo'=>'required',
        'issn'=>'required',
        'inicio_publicacao'=>'required',        
        'editor_responsavel'=>'required',
        'qualis'=>'required'
    ];
    public function mount($id)
    {
        $this->revista = Revista::find($id);
        $this->instituicao = Instituicao::get();
        $this->visivel = true;
        $this->instituicao_id = $this->revista->instituicoe_id;
        $this->titulo = $this->revista->titulo;
        $this->subtitulo = $this->revista->subtitulo;
        $this->issn = $this->revista->issn;
        $this->inicio_publicacao = $this->revista->inicio_publicacao;
        $this->periodicidade = $this->revista->periodicidade;
        $this->qualis = $this->revista->qualis;
        $this->capa = $this->revista->capa;
        $this->visivel = $this->revista->visivel;
        $this->editor_responsavel = $this->revista->editor_responsavel;
       

    }
    public function render()
    {
        return view('livewire.admin.revista.edit');
    }
    public function update()
    {
        try
        {
            $this->validate();
            $this->revista->update([
                'instituicoe_id'=>$this->instituicao_id,
                'titulo'=>$this->titulo,
                'subtitulo'=>$this->subtitulo,
                'issn'=>$this->issn,
                'inicio_publicacao'=>$this->inicio_publicacao,
                'periodicidade'=>$this->periodicidade,
                'editor_responsavel'=>$this->editor_responsavel,
                'qualis'=>$this->qualis, 
                'capa'=>'storage\revistas\capa_'.str_replace(' ','_',$this->titulo).'_'.str_replace(' ','_',$this->issn).'.'.$this->capa->extension(),               
                'visivel'=>$this->visivel
            ]);
            if('storage\revistas\capa_'.str_replace(' ','_',$this->titulo).'_'.str_replace(' ','_',$this->issn).'.'.$this->capa->extension() != $this->revista->capa )
            {
                if(File::exists(public_path($this->revista->capa))){                    
                    File::delete(public_path($this->revista->capa));        
                }
                $this->capa->storePubliclyAs('public\revistas\\','capa_'.str_replace(' ','_',$this->titulo).'_'.str_replace(' ','_',$this->issn).'.'.$this->capa->extension());

            }
            $this->emit('toast','Registro atualizado com sucesso!','success');            
            $this->reset();
            $this->emit('changePage','index');
            $this->emit('refreshDatatable');
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
}
