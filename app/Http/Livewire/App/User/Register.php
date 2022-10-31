<?php

namespace App\Http\Livewire\App\User;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Repositories\ImageRepository;
use App\Models\User;
use App\Models\Role;
use App\Models\Office;
use Image;


class Register extends Component
{
    public $name;
    public $fullname;
    public $email;
    public $phone;
    public $role_id;
    public $office_id;
    public $password;
    public $password_confirmation;
    public $foto_user;

    public $offices;
    public $roles;
    

    public function updatedProfileFoto()
    {
        
    }

    public function store()
    {
        $this->validate([
            'name'=>['required', 'string','min:6', 'max:16', 'unique:users', 'alpha_dash'],
            'fullname'=>['required','max:150'],
            'email'=>['required','email'],
            'phone'=>'required',
            'password'=>'min:6|confirmed',
            'office_id'=>'required',
            'role_id'=>'required'
        ]);

        $user = User::create([
            'name'=>$this->name,
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'password'=>bcrypt($this->password),
            'office_id'=>$this->office_id,
            'role_id'=>$this->role_id
        ]);
        
        if($user){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil simpan data user',
                'type'=>'success'
            ]);
            return redirect()->route('users');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal simpan data user',
                'type'=>'error'
            ]);
            return redirect()->route('user.register')->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->roles = Role::all();
        $this->offices = Office::all();
        return view('livewire.app.user.register')->extends('layouts.master');
    }
}
