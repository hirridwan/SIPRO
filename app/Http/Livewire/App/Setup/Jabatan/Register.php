<?php

namespace App\Http\Livewire\App\Setup\Jabatan;

use App\Models\Jabatan;
use App\Models\Bagian;
use Livewire\Component;

class Register extends Component
{

    public $nama,$singkatan,$level,$bagian_id;

    public $bagians;

    public function store()
    {
        
        $this->validate([
            'nama'=>'required',
            'singkatan'=>'required',
            'level'=>'required',
            'bagian_id'=>'required',
        ]);
        
        // dd($this->nilai_pasar);
        $jabatan = Jabatan::create([
            'nama'=>$this->nama,
            'singkatan'=>$this->singkatan,
            'level'=>$this->level,
            'bagian_id'=>$this->bagian_id,
        ]);

        // dd($jabatan);
        
        if($jabatan){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data jabatan',
                'type'=>'success'
            ]);
            return redirect()->route('setup.jabatan');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data jabatan',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->bagians = Bagian::all();
        return view('livewire.app.setup.jabatan.register')->extends('layouts.master');
    }
}
