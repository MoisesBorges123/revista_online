<?php

namespace App\Http\Livewire\Blog\Revistas;

use App\Models\Revista;
use App\Models\Instituicao;
use App\Models\AreaEstudo;
use Livewire\Component;

class Index extends Component
{
    public $revistas, $search, $instituicao, 
    $filter,$filterSelected=[],$filterSelectedLabel=[], $filterInstituition, $filterAreaConhecimento,
    $areasdoconhecimento,$instituicoes;
    public function mount($id=null)
    {
        $this->filterSelected['areaconhecimento']=[];
        $this->filterSelected['instituicao']=[];
        $this->filterSelectedLabel['areaconhecimento']=[];
        $this->filterSelectedLabel['instituicao']=[];
        $this->filter=false;
        if(!empty($id))
        {
            $this->instituicao = Instituicao::find($id);
        }
        
       $this->getLast();
       $this->getAreasDoConhecimento();
       $this->getInstituicoes();
        
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
    public function updatedFilterAreaConhecimento()
    {
        $dado = explode(',',$this->filterAreaConhecimento);
        array_push($this->filterSelected['areaconhecimento'],$dado[0]);
        array_push($this->filterSelectedLabel['areaconhecimento'],$dado[1]);
        $this->filterAreaConhecimento = '';
        $this->filter();
    }
    public function updatedFilterInstituition()
    {
        
        $dado = explode(',',$this->filterInstituition);
        array_push($this->filterSelected['instituicao'],$dado[0]);
        array_push($this->filterSelectedLabel['instituicao'],$dado[1]);
        $this->filterInstituition = '';
        $this->filter();
    }
    public function search()
    {
        
        if(empty($this->instituicao->id))
        {
            if(!empty($this->search)){
                $this->revistas = Revista::where('titulo','like','%'.$this->search.'%')
                ->orwhereRelation('instituicao','nome_fantasia','like','%'.$this->search.'%')
                ->where('inicio_publicacao','<=',date('Y-m-d',time()))
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
                ->where('inicio_publicacao','<=',date('Y-m-d',time()))
                ->where('instituicoe_id',$this->instituicao->id)
                ->where('visivel',1)                
                ->get();
                //dd($this->revistas,$this->instituicao->id);
            }else{
                $this->getLast();
            }
        }
        
    }
    public function filter()
    {
        $this->filterInstituicao();
        $this->filterAreaConhecimento();
    }
    private function filterInstituicao()
    {
        foreach( $this->filterSelected['instituicao'] as $id)
        {
            $this->revistas = $this->revistas->where('instituicoe_id',$id);
        }
    }
    private function filterAreaConhecimento()
    {  
        /**
         * Filtro via javascript
         * 1- Adiciona a classe d-none em todos os elementos que não sejam igual às
         * areas do conhecimento filtrado
         */
        $this->emit('filterAreaDoConhecimento',$this->filterSelected['areaconhecimento']);
       
    }
    public function unsetFilter($dado,$typeArray)
    {
        
                
        if (($key = array_search($dado, $this->filterSelectedLabel[$typeArray])) !== false) {            
            unset($this->filterSelected[$typeArray][$key]);
            unset($this->filterSelectedLabel[$typeArray][$key]);             
            $this->search();
            $this->filter(); 
        }
    }
    public function unsetinstituicao()
    {
        $this->instituicao = null;
        $this->search();
    }
    public function setFilter(){
        $this->filter = !$this->filter;
    }
    private function getLast()
    {
        if(empty($this->instituicao->id))
        {
            $take = 100;
            $total = count(Revista::get());        
            $skip = $total-$take;
            $this->revistas = Revista::where('inicio_publicacao','<=',date('Y-m-d',time()))
            ->where('visivel',1)
            ->take($take)->skip($skip)->get();
        }else
        {
            $take = 100;
            $total = count(Revista::get());        
            $skip = $total-$take;
            $this->revistas = Revista::where('inicio_publicacao','<=',date('Y-m-d',time()))
            ->where('instituicoe_id',$this->instituicao->id)
            ->where('visivel',1)
            ->take($take)->skip($skip)->get();
        }
        
        
    }
    private function getInstituicoes()
    {
        $this->instituicoes = Instituicao::get();
    }
    private function getAreasDoConhecimento()
    {
        $this->areasdoconhecimento = AreaEstudo::get();
    }
} 