<?php

namespace App\Http\Livewire\App\Data\Pegawai;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Bagian;

class Index extends Component
{

    use WithPagination;

    public $paginate = 20;
    public $paginationTheme='bootstrap';
    public $querySearch=null;
    
    protected $listeners = ['delete'];

    
    public function updatingQuerySearch()
    {
        $this->resetPage();
    }

    public function deleteConfirm($id,$nama)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data pegawai '.$nama. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $pegawai = Pegawai::find($id)->delete();

        if($pegawai){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data pegawai',
                'type'=>'success'
            ]);
            return redirect()->route('data.pegawai');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data pegawai',
                'type'=>'error'
            ]);
            return redirect()->route('data.pegawai');
        }
    }

    public function render()
    {
        return view('livewire.app.data.pegawai.index',[
            'pegawais'=>$this->querySearch===null?
                Pegawai::paginate($this->paginate):
                Pegawai::where('nama','like',"%".$this->querySearch."%")
                    ->orWhere('office_code','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}
