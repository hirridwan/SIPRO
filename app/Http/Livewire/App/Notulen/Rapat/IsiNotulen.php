<?php

namespace App\Http\Livewire\App\Notulen\Rapat;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Rapat;
use App\Models\Pendapat;
use App\Models\Pegawai;

class IsiNotulen extends Component
{
    protected $listeners = [
        'delete',
        'deleted'=>'handleDeleted',
        'pendapatUpdated'=>'handlePendapatUpdated'
    ];

    public $noRegistrasi;
    public $rapatId;
    public $rapat;
    public $pendapat;
    public $newPendapat;

    public function mount($id)
    {
        $rapat = Rapat::find($id);
        $this->rapatId=$rapat->id;
        $this->noRegistrasi=$rapat->no_registrasi;
        $this->rapat = $rapat;
    }  

    public function deleteConfirm($id,$pendapat)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus pendapat '.$pendapat. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $pendapat = Pendapat::find($id)->delete();

        if($pendapat){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data pendapat',
                'type'=>'success'
            ]);
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data pendapat',
                'type'=>'error'
            ]);
        }

        $this->emit('deleted',$pendapat);
    }

    public function storePendapat()
    {
        $this->validate([
            'newPendapat.pegawai_id'=>'required',
            'newPendapat.pendapat'=>'required',
        ]);
        $pendapat = Pendapat::create([
            "rapat_id"=>$this->rapatId,
            "pegawai_id"=>$this->newPendapat['pegawai_id'],
            "pendapat"=>$this->newPendapat['pendapat']
        ]);

        $this->reset('newPendapat');
        $this->emit('pendapatUpdated',$pendapat);
    }

    public function handleDeleted($pendapat)
    {
        
    }

    public function handlePendapatUpdated($pendapat)
    {
        // dd($pendapat);
    }

    public function render()
    {
        $peserta = $this->rapat->peserta;
        return view('livewire.app.notulen.rapat.isi-notulen',[
            'peserta'=>$peserta
        ])->extends('layouts.master');
    }
}
