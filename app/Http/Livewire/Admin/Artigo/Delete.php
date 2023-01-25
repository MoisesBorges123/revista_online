<?php

namespace App\Http\Livewire\Admin\Artigo;

use App\Models\Artigo;
use Livewire\Component;

class Delete extends Component
{
    public $listeners =[
        'delete'               
    ];
    public function render()
    {
        return view('livewire.admin.artigo.delete');
    }
    public function delete($ids)
    {
        
        try{
            if(count($ids) ==1)
            {
                $artigo = Artigo::find($ids[0]);
                $artigo->delete();
                $this->emit('toast','Artigo excluido com sucesso!','success');
                
            }else 
            {
                $i=0;
                foreach($ids as $id)
                {
                    
                    $artigo = artigo::find($id);
                    if($artigo->delete()){
                        $i++;
                    }
                }
                if($i==count($ids))
                {
                    $this->emit('toast','Todos os registros foram excluidos com sucesso.','success');
                }else if($i>0 && $i != count($ids))
                {
                    $this->emit('toast',"$i não foram possívels excluir, tente mais tarte.",'warning');

                }
            }
            $this->emit('refreshDatatable');
        }catch(\Exception $e){
            $this->emit('toast',$e->getMessage(),'error');
        }
    }
}
