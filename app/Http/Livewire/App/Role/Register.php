<?php

namespace App\Http\Livewire\App\Role;

use Livewire\Component;
use App\Models\Role;
use App\Models\LoanQuality;
use App\Models\LoanProduct;

class Register extends Component
{

    public $description,$shortname,$authorityLevel;

    public function store()
    {
        $this->validate([
            'description'=>'required',
            'shortname'=>'required'
        ]);

        $role = Role::create([
            'description'=>$this->description,
            'shortname'=>$this->shortname,
            'authority_level'=>$this->authorityLevel,
        ]);
        
        if($role){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data role',
                'type'=>'success'
            ]);
            return redirect()->route('setup.roles');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data role',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.app.role.register')->extends('layouts.master');
    }
}
