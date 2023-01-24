<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\Instituicao;
use App\Models\Revista;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $instituicao_id, $titulo, $subtitulo, $issn, $inicio_publicacao, $periodicidade, $qualis, $capa, $visivel, $instituicao, $editor_responsavel;
    protected $rules = [
        'instituicao_id'=>'required',
        'titulo'=>'required',
        'issn'=>'required',
        'inicio_publicacao'=>'required',        
        'editor_responsavel'=>'required',
        'qualis'=>'required',
        'capa' => 'image|max:1024'
    ];
    public function mount()
    {
        $this->instituicao = Instituicao::get();
        $this->visivel = true;
    }
    public function render()
    {
        return view('livewire.admin.revista.create');
    }
    public function store()
    {
        //dd($this->capa);
        try
        {
            
            $this->validate();
            Revista::create([
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
            $this->capa->storePubliclyAs('public\revistas\\','capa_'.str_replace(' ','_',$this->titulo).'_'.str_replace(' ','_',$this->issn).'.'.$this->capa->extension());
            $this->emit('changePage','index');
            $this->emit('toast','Revista cadastrada com sucesso!','success');
        

        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
}