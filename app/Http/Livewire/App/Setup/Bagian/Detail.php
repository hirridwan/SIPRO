<?php

namespace App\Http\Livewire\App\Setup\Bagian;

use Livewire\Component;
use App\Models\Bagian;

class Detail extends Component
{

    public $bagianId,$nama;

    public function mount($id)
    {
        $bagian = Bagian::find($id);
        $this->bagianId=$bagian->id;
        $this->nama=$bagian->nama;
    }

    public function update()
    {
        $this->validate([
            'nama'=>'required',
        ]);

        $bagian = Bagian::find($this->bagianId)->update([
            'nama'=>$this->nama,
        ]);

        if($bagian){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data bagian',
                'type'=>'success'
            ]);
            return redirect()->route('setup.bagian');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data bagian',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.app.setup.bagian.detail')->extends('layouts.master');
    }
}
