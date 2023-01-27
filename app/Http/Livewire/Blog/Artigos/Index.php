<?php

namespace App\Http\Livewire\Blog\Artigos;

use App\Models\Artigo;
use App\Models\Revista;
use Livewire\Component;

class Index extends Component
{
    public  $artigos, $revista;
    public function mount()
    {        
        
       // $this->artigos = Artigo::where('revista_id',$this->revista->id)->get();
        
        
    }
    public function render()
    {
        return view('livewire.blog.artigos.index');
    }
}
