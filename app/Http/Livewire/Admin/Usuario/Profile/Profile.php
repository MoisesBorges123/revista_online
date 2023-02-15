<?php

namespace App\Http\Livewire\Admin\Usuario\Profile;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.admin.usuario.profile.profile')->layout('layouts.app');
    }
}
