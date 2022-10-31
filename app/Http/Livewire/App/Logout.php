<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{    
    public function logoutConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'title'=>'Logout?',
            'type'=>'warning',
            'text'=>''
        ]);
    }
    
    public function render()
    {
        return view('livewire.app.logout');
    }
}
