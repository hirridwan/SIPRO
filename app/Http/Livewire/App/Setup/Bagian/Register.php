<?php

namespace App\Http\Livewire\App\Setup\Bagian;

use App\Models\Bagian;
use Livewire\Component;
use Symfony\Component\Console\Input\Input;

class Register extends Component
{
    public $nama;

    public function store()
    {
        
        $this->validate([
            'nama'=>'required',
        ]);
        
        // dd($this->nilai_pasar);
        $bagian = Bagian::create([
            'nama'=>$this->nama,
            
        ]);

        // dd($bagian);
        
        if($bagian){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data bagian',
                'type'=>'success'
            ]);
            return redirect()->route('setup.bagian');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data bagian',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.app.setup.bagian.register')->extends('layouts.master');
    }
}
