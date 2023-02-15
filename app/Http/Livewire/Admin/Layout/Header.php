<?php

namespace App\Http\Livewire\Admin\Layout;

use Livewire\Component;
use App\Models\Alert;
class Header extends Component
{
    public $alerts;
    public function mount()
    {
        $this->alerts = Alert::where('user_id',auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.admin.layout.header');
    }
    public function delete($id)
    {
        $alert = Alert::find($id);
        $alert->delete();
    }
}
