<?php

namespace App\Http\Livewire\App\Data\Pegawai;

use App\Models\Office;
use App\Models\UnitKerja;
use App\Models\Jabatan;
use App\Models\Bagian;
use App\Models\Pegawai;
use App\Models\User;
use App\Repositories\ImageRepository;
use App\Repositories\Helper;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;   
use Image;
use File;


class Register extends Component
{
    use WithFileUploads;

    public $nama,$office_code,$unit_kerja_id,$jabatan_id,$bagian_id,$user_id,$ttd,$foto;
    public $offices,$unit_kerjas,$jabatans,$bagians,$users;
    public $encodedTtd,$encodedFoto;

    public function updatedTtd()
    {
        $helper = new Helper;
        $ttdResized = new ImageRepository;
        $ttdPath = $ttdResized->fitImageUploads($this->ttd,'img/img/temp',100,100);
        $this->encodedTtd = $helper->toBase64($ttdPath);
        
        if(File::exists(public_path($ttdPath)))
        {
            File::delete(public_path($ttdPath));
        }else{
            'file not found';
        }
        $ttdPath=null;
    }

    public function clearUploadTtd()
    {
        if($this->encodedTtd)
        {
            $this->encodedTtd=null;
        }else{
            'file not found';
        }
        if($this->ttd)
        {
            $this->ttd=null;
        }else{
            'file not found';
        }
    }
    public function updatedFoto()
    {
        $helper = new Helper;
        $fotoResized = new ImageRepository;
        $fotoPath = $fotoResized->fitImageUploads($this->foto,'img/img/temp',450,600);
        $this->encodedFoto = $helper->toBase64($fotoPath);
        
        if(File::exists(public_path($fotoPath)))
        {
            File::delete(public_path($fotoPath));
        }else{
            'file not found';
        }
        $fotoPath=null;
    }
    public function clearUploadFoto()
    {
        if($this->encodedFoto)
        {
            $this->encodedFoto=null;
        }else{
            'file not found';
        }
        if($this->foto)
        {
            $this->foto=null;
        }else{
            'file not found';
        }
    }
    public function store()
    {
        $this->validate([
            'nama'=>'required',
            'office_code'=>'required',
            'unit_kerja_id'=>'required',
            'jabatan_id'=>'required',
        ]);

        $pegawai = Pegawai::create([
            'nama'=>$this->nama,
            'office_code'=>$this->office_code,
            'unit_kerja_id'=>$this->unit_kerja_id,
            'jabatan_id'=>$this->jabatan_id,
            'bagian_id'=>$this->bagian_id,
            'user_id'=>$this->user_id,
            'ttd'=>$this->encodedTtd,
            'foto'=>$this->encodedFoto,
        ]);
        
        if($pegawai){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data pegawai',
                'type'=>'success'
            ]);
            return redirect()->route('data.pegawai');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data pegawai',
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
        return view('livewire.app.data.pegawai.register')->extends('layouts.master');
    }
}
