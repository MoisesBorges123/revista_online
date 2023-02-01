<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\AreaEstudo;
use App\Models\Instituicao;
use App\Models\Revista;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    use WithFileUploads;
    public $revista, $newcapa, $instituicao_id, $titulo, $subtitulo, $issn, $inicio_publicacao, $periodicidade, $qualis, $capa, $visivel=[], $instituicao, $editor_responsavel;
    public $areasConhecimentos, $areaConhecimento_selected=[];
    protected $rules = [
        'instituicao_id'=>'required',
        'titulo'=>'required',
        'issn'=>'required',
        'inicio_publicacao'=>'required',        
        'editor_responsavel'=>'required',
        'qualis'=>'required',
        'capa'=>'required'
    ];
    public function mount($id)
    {
        $this->revista = Revista::find($id);
        $this->instituicao = Instituicao::get();
        $this->areasConhecimentos = AreaEstudo::get();        
        $this->instituicao_id = $this->revista->instituicoe_id;
        $this->titulo = $this->revista->titulo;
        $this->subtitulo = $this->revista->subtitulo;
        $this->issn = $this->revista->issn;
        $this->inicio_publicacao = $this->revista->inicio_publicacao;
        $this->periodicidade = $this->revista->periodicidade;
        $this->qualis = $this->revista->qualis;
        $this->capa = $this->revista->capa;
        array_push($this->visivel,$this->revista->visivel);
        $this->editor_responsavel = $this->revista->editor_responsavel;
        
        if(!empty($this->revista->areas_conhecimentos)){
            foreach($this->revista->areas_conhecimentos as $item){
                array_push($this->areaConhecimento_selected,$item->id);
            }

        }
    }
    public function render()
    {
        return view('livewire.admin.revista.edit');
    }
    public function update()
    {
        $this->validate();
        try
        {
            $this->revista->update([
                'instituicoe_id'=>$this->instituicao_id,
                'titulo'=>$this->titulo,
                'subtitulo'=>$this->subtitulo,
                'issn'=>$this->issn,
                'inicio_publicacao'=>$this->inicio_publicacao,
                'periodicidade'=>$this->periodicidade,
                'editor_responsavel'=>$this->editor_responsavel,
                'qualis'=>$this->qualis, 
                'capa'=>empty($this->newcapa) ? $this->capa : 'storage\revistas\capa_'.str_replace(' ','_',$this->titulo).'_'.str_replace(' ','_',$this->issn).'.'.$this->newcapa->extension(),
                'visivel'=>empty($this->visivel) ? false : true
            ]);
            if(!empty($this->newcapa)){
               
                    if(File::exists(public_path($this->revista->capa))){                    
                        File::delete(public_path($this->revista->capa));        
                    }
                    $this->newcapa->storePubliclyAs('public\revistas\\','capa_'.str_replace(' ','_',$this->titulo).'_'.str_replace(' ','_',$this->issn).'.'.$this->newcapa->extension());
    
               
            }
            $this->revista->areas_conhecimentos()->detach();
            if(count($this->areaConhecimento_selected)>0)
            {
                
                foreach($this->areaConhecimento_selected as $id){
                    
                    $this->revista->areas_conhecimentos()->attach($id);
                }
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
