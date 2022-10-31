<?php

namespace App\Http\Livewire\App\Setup\Jabatan;

use App\Models\Jabatan;
use App\Models\Bagian;
use Livewire\Component;

class Detail extends Component
{
    public $jabatanId,$nama,$singkatan,$level,$bagian_id;

    public $bagians;

    public function mount($id)
    {
        $jabatan = Jabatan::find($id);
        $this->jabatanId=$jabatan->id;
        $this->nama=$jabatan->nama;
        $this->singkatan=$jabatan->singkatan;
        $this->level=$jabatan->level;
        $this->bagian_id=$jabatan->bagian_id;
    }

    public function update()
    {
        $this->validate([
            'nama'=>'required',
            'singkatan'=>'required',
            'level'=>'required',
            'bagian_id'=>'required',
        ]);

        $jabatan = Jabatan::find($this->jabatanId)->update([
            'nama'=>$this->nama,
            'singkatan'=>$this->singkatan,
            'level'=>$this->level,
            'bagian_id'=>$this->bagian_id,
        ]);

        if($jabatan){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data jabatan',
                'type'=>'success'
            ]);
            return redirect()->route('setup.jabatan');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data jabatan',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->bagians = Bagian::all();
        return view('livewire.app.setup.jabatan.detail')->extends('layouts.master');
    }
}
