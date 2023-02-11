<?php

namespace App\Http\Livewire\Admin\Instituicao;
use App\Models\Instituicao;
use App\Models\User;
use Livewire\Component;
use App\Actions\Jetstream\DeleteUser;
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
                $user = User::where('email',$instituicao->email)->first();
                
                if(!empty($user))
                {
                    $actionDeleteUser = new DeleteUser($user);
                    $actionDeleteUser->delete($user);
                                      
                }
                $instituicao->delete();
              
                $this->emit('toast','Institução excluida com sucesso!','success');
                
            }else 
            {
                $i=0;
                foreach($ids as $id)
                {
                    
                    $instituicao = Instituicao::find($id);
                    $user = User::where('email',$instituicao->email)->first();
                 
                    if(!empty($user))
                    {
                        $actionDeleteUser = new DeleteUser($user);
                        $actionDeleteUser->delete($user);
                       
                    }
                    if($instituicao->delete() ){
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
