<?php

namespace App\Http\Livewire\Admin\Usuario\Profile;

use Livewire\Component;
use App\Actions\Fortify\UpdateUserPassword;
class ChangePassword extends Component
{
    public $current_password,$password,$confirm_password, $changePass;
    
    public function render()
    {
        return view('livewire.admin.usuario.profile.change-password');
    }
    public function changePassword()
    {
        try{
            $changePass = new UpdateUserPassword();
            $changePass->update(auth()->user(),[
                'current_password'=>$this->current_password,
                'password'=>$this->password,
                'confirm_password'=>$this->confirm_password
            ]);
        }catch(\Exception $e)
        {
            $this->emit('toast',$e->getMessage(),'error');
        }
        
    }
}
