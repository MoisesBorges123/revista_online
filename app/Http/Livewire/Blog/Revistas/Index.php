<?php

namespace App\Http\Livewire\Blog\Revistas;

use App\Models\Revista;
use App\Models\Instituicao;
use Livewire\Component;

class Index extends Component
{
    public $revistas, $search, $instituicao ;
    public function mount($id=null)
    {
        if(!empty($id))
        {
            $this->instituicao = Instituicao::find($id);
        }
        
       $this->getLast();
        
    }
    public function render()
    {
        return view('livewire.blog.revistas.index',[
            'listings'=>Revista::whereLike('model',$this->search)
        ]);
    }
    public function updatedSearch()
    {
        $this->search();
    }
    public function search()
    {
        if(empty($this->instituicao->id))
        {
            if(!empty($this->search)){
                $this->revistas = Revista::where('titulo','like','%'.$this->search.'%')
                ->orwhereRelation('instituicao','nome_fantasia','like','%'.$this->search.'%')
                ->where('inicio_publicacao','>=',date('Y-m-d',time()))
                ->orWhere('subtitulo','like','%'.$this->search.'%')            
                ->orWhere('issn','like','%'.$this->search.'%')            
                ->orWhere('qualis','like','%'.$this->search.'%') 
                ->get();
            }else{
                $this->getLast();
            }
        }else
        {
            if(!empty($this->search)){
                $this->revistas = Revista::where('titulo','like','%'.$this->search.'%')
                ->where('inicio_publicacao','>=',date('Y-m-d',time()))
                ->where('instituicoes_id',$this->instituicao->id)
                ->orwhereRelation('instituicao','nome_fantasia','like','%'.$this->search.'%')
                ->orWhere('subtitulo','like','%'.$this->search.'%')            
                ->orWhere('issn','like','%'.$this->search.'%')            
                ->orWhere('qualis','like','%'.$this->search.'%') 
                ->get();
            }else{
                $this->getLast();
            }
        }
        
    }
    public function unsetinstituicao()
    {
        $this->instituicao = null;
        $this->search();
    }
    private function getLast()
    {
        if(empty($this->instituicao->id))
        {
            $take = 50;
            $total = count(Revista::get());        
            $skip = $total-$take;
            $this->revistas = Revista::where('inicio_publicacao','<=',date('Y-m-d',time()))
            ->where('visivel',1)
            ->take($take)->skip($skip)->get();
        }else
        {
            $take = 50;
            $total = count(Revista::get());        
            $skip = $total-$take;
            $this->revistas = Revista::where('inicio_publicacao','<=',date('Y-m-d',time()))
            ->where('instituicoe_id',$this->instituicao->id)
            ->where('visivel',1)
            ->take($take)->skip($skip)->get();
        }
        
    }
} 