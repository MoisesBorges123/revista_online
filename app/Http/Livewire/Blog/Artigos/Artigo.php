<?php

namespace App\Http\Livewire\Blog\Artigos;

use App\Models\Artigo as ModelsArtigo;
use App\Models\Revista;
use Livewire\Component;

class Artigo extends Component
{
    public $revista, $search, $artigos;
    public function mount($id=null)
    {
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
        if(!empty($this->revista) && count($this->revista->toArray())==0)
        {
            $total = count(ModelsArtigo::where('inicio_publicacao','<=',date('Y-m-d',time()))->get());        
            $take = $total==0 ? 0 : 50;
            $skip = $total-$take;
            return ModelsArtigo::where('inicio_publicacao','<=',date('Y-m-d',time()))        
            ->take($take)->skip($skip)->get();
        }else
        {
           
            return $this->revista->artigos;
           
        }
        
    }
}
