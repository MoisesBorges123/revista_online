<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Revista;

class Home extends Component
{
    public $revistas;
    public function mount()
    {
       $this->getDados();
        
    }
    public function render()
    {
        return view('livewire.home.home');
    }
    public function getDados(){
        $take = 5;
            $total = count(Revista::where('inicio_publicacao','<=',date('Y-m-d',time()))
            ->where('visivel',1)->get()); 
           //dd($total);
            $skip = $total-$take;
            $this->revistas = Revista::where('inicio_publicacao','<=',date('Y-m-d',time()))
            ->where('visivel',1)
            ->take($take)->skip($skip)->get();
            
    }
}
