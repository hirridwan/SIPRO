<?php

namespace App\Http\Livewire\App\Office;

use Livewire\Component;
use App\Models\Office;

class Register extends Component
{
    public $code,$name,$shortname,$address,$order;
    
    public function store()
    {
        $this->validate([
            'code'=>'required',
            'name'=>'required',
            'shortname'=>'required',
            'address'=>'required',
            'order'=>'required'
        ]);

        $office = Office::create([
            'code'=>$this->code,
            'name'=>$this->name,
            'shortname'=>$this->shortname,
            'address'=>$this->address,
            'order'=>$this->order
        ]);

        if($office){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data kantor',
                'type'=>'success'
            ]);
            return redirect()->route('setup.offices');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data kantor',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.app.office.register')->extends('layouts.master');
    }
}
