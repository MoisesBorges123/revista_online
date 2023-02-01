<?php

namespace App\Http\Livewire\Blog\Artigos;

use App\Models\Artigo as ModelsArtigo;
use App\Models\Revista;
use Livewire\Component;

class Artigo extends Component
{
    public $revista, $search, $artigos, $revista_id;
    public function mount($id=null)
    {
        $this->revista_id = $id;
        $this->revista = Revista::find($id);                  
        $this->artigos = $this->getLast();      
       
    }
    public function render()
    {
        return view('livewire.blog.artigos.artigo');
    }
    public function updatedSearch(){
        $this->search();
        //dd($this->artigos);
    }
    public function search(){
        if(!empty($this->search)){
            $this->artigos = ModelsArtigo::where('titulo','like','%'.$this->search.'%')
            ->where('inicio_publicacao','>=',date('Y-m-d',time()))
            //->orwhereRelation('autores','nome','like','%'.$this->search.'%')
            ->orWhere('titulo','like','%'.$this->search.'%')            
            ->orWhere('palavra_chave','like','%'.$this->search.'%')            
            ->orWhere('doi','like','%'.$this->search.'%')            
            ->orWhere('ano','like','%'.$this->search.'%') 
            ->orWhere('link_externo','like','%'.$this->search.'%') 
            ->get();
            //dd($this->artigos);
        }else{
            $this->getLast();
        }
        
    }
    private function getLast()
    {
        //dd(($this->revista->artigos->toArray()));
        if(!empty($this->revista_id) )
        {
            $total = count(ModelsArtigo::where('inicio_publicacao','<=',date('Y-m-d',time()))->where('revista_id',$this->revista->id)->get());        
            $take = $total==0 ? 0 : 50;
            $skip = $total-$take;
            return ModelsArtigo::where('inicio_publicacao','<=',date('Y-m-d',time()))  
            ->where('revista_id',$this->revista->id)     
            ->take($take)->skip($skip)->get();
            return $this->revista->artigos->where('inicio_publicacao','<=',date('Y-m-d',time()))->get();           
        }else
        {
            $total = count(ModelsArtigo::where('inicio_publicacao','<=',date('Y-m-d',time()))->get());        
            $take = $total==0 ? 0 : 50;
            $skip = $total-$take;
            return ModelsArtigo::where('inicio_publicacao','<=',date('Y-m-d',time()))       
            ->take($take)->skip($skip)->get();
           
        
           
        }
        
    }
}
