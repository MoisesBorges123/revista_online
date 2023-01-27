<?php

namespace App\Http\Livewire\Blog\Artigos;

use App\Models\Artigo as ModelsArtigo;
use App\Models\Revista;
use Livewire\Component;

class Artigo extends Component
{
    public $revista, $search, $artigos;
    public function mount($id)
    {
        $this->revista = Revista::find($id);      
        $artigos = $this->getLast();  
    }
    public function render()
    {
        return view('livewire.blog.artigos.artigo');
    }
    public function updatedSearch(){
        $this->search();
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
        $take = 10;
        $total = count(Revista::get());        
        $skip = $total-$take;
        $this->artigos = ModelsArtigo::where('inicio_publicacao','<=',date('Y-m-d',time()))        
        ->take($take)->skip($skip)->get();
    }
}
