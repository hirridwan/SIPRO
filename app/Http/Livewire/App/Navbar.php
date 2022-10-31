<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    protected $listeners =['logout'];
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.app.navbar');
    }
}
