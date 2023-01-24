<?php

namespace App\Http\Livewire\Admin\Revista;

use App\Models\Revista;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class Delete extends Component
{
    public $listeners =[
        'delete'               
    ];
    public function render()
    {
        return view('livewire.admin.revista.delete');
    }
    public function delete($ids)
    {
        
        try{
            if(count($ids) ==1)
            {
                $revista = Revista::find($ids[0]);                
                $this->emit('toast','Revista excluida com sucesso!','success');
                if(File::exists(public_path($revista->capa))){                    
                    File::delete(public_path($revista->capa));        
                }else{
                    
                    $this->emit('toast','Não foi possível encontrar e excluir o arquivo da capa da revista','warning');
                    
                }
                $revista->delete();
                
            }else 
            {
                $i=0;
                foreach($ids as $id)
                {
                    
                    $revista = Revista::find($id);
                    if(!empty($revista)){
                        if(File::exists(public_path($revista->capa))){                    
                            File::delete(public_path($revista->capa));        
                        }else{
                            
                            $this->emit('toast','Não foi possível encontrar e excluir o arquivo da capa da revista','warning');
                            
                        }
                        if($revista->delete()){
                            $i++;
                        }
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
