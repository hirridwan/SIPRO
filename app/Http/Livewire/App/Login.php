<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $name;
    public $password;


    public function login()
    {
        $this->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['name'=>$this->name,'password'=>$this->password]))
        {
            // session()->flash('success','Berhasil Login');
            $this->dispatchBrowserEvent('swal:modal',[
                'type'=>'success',
                'title'=>'Login Sukses!'
            ]);
            return redirect()->route('dashboard');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'type'=>'error',
                'title'=>'Login Gagal!',
                'text'=>'Email atau Password salah!'
            ]);
            // session()->flash('error','Email atau Passsword Salah');
            return redirect()->route('login');
        }

    }
    public function render()
    {
        return view('livewire.app.login')->extends('layouts.login');
    }
}
