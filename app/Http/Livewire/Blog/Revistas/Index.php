<?php

namespace App\Http\Livewire\Blog\Revistas;

use App\Models\Revista;
use Livewire\Component;

class Index extends Component
{
    public $revistas, $search ;
    public function mount()
    {
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
    }
    private function getLast()
    {
        $take = 10;
        $total = count(Revista::get());        
        $skip = $total-$take;
        $this->revistas = Revista::where('inicio_publicacao','<=',date('Y-m-d',time()))
        ->where('visivel',1)
        ->take($take)->skip($skip)->get();
    }
} 