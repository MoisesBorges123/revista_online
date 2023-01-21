<?php

namespace App\Http\Livewire\Admin\Instituicao;
use App\Models\Instituicao;
use Livewire\Component;

class Delete extends Component
{
    public $listeners =[
        'delete'               
    ];
    public function render()
    {
        return view('livewire.admin.instituicao.delete');
    }
    public function delete($ids)
    {
        
        try{
            if(count($ids) ==1)
            {
                $instituicao = Instituicao::find($ids[0]);
                $instituicao->delete();
                $this->emit('toast','Institução excluida com sucesso!','success');
                
            }else 
            {
                $i=0;
                foreach($ids as $id)
                {
                    
                    $instituicao = Instituicao::find($id);
                    if($instituicao->delete()){
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
