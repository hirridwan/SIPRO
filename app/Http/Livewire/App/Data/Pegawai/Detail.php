<?php

namespace App\Http\Livewire\App\Data\Pegawai;

use App\Models\Office;
use App\Models\UnitKerja;
use App\Models\Jabatan;
use App\Models\Bagian;
use App\Models\Pegawai;
use App\Models\User;
use Livewire\Component;

class Detail extends Component
{

    public $pegawaiId,$nama,$office_code,$unit_kerja_id,$jabatan_id,$bagian_id,$user_id,$ttd;

    public $offices,$unit_kerjas,$jabatans,$bagians,$users;

    public function mount($id)
    {
        $pegawai = Pegawai::find($id);
        $this->pegawaiId=$pegawai->id;
        $this->nama=$pegawai->nama;
        $this->office_code=$pegawai->office_code;
        $this->unit_kerja_id=$pegawai->unit_kerja_id;
        $this->jabatan_id=$pegawai->jabatan_id;
        $this->bagian_id=$pegawai->bagian_id;
        $this->user_id=$pegawai->user_id;
        $this->ttd=$pegawai->ttd;
    }

    public function update()
    {
        $this->validate([
            'nama'=>'required',
            'office_code'=>'required',
            'unit_kerja_id'=>'required',
            'jabatan_id'=>'required',
        ]);

        $pegawai = Pegawai::find($this->pegawaiId)->update([
            'nama'=>$this->nama,
            'office_code'=>$this->office_code,
            'unit_kerja_id'=>$this->unit_kerja_id,
            'jabatan_id'=>$this->jabatan_id,
        ]);

        if($pegawai){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data pegawai',
                'type'=>'success'
            ]);
            return redirect()->route('data.pegawai');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data pegawai',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->offices = Office::all();
        $this->unit_kerjas = UnitKerja::all();
        $this->jabatans = Jabatan::all();
        $this->bagians = Bagian::all();
        $this->users = User::all();
        return view('livewire.app.data.pegawai.detail')->extends('layouts.master');
    }
}
