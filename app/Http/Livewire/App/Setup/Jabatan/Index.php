<?php

namespace App\Http\Livewire\App\Setup\Jabatan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jabatan;

class Index extends Component
{

    use WithPagination;

    public $paginate = 5;
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
            'text'=>'Yakin akan menghapus data jabatan '.$nama. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $jabatan = Jabatan::find($id)->delete();

        if($jabatan){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data jabatan',
                'type'=>'success'
            ]);
            return redirect()->route('setup.jabatan');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data jabatan',
                'type'=>'error'
            ]);
            return redirect()->route('setup.jabatan');
        }
    }

    public function render()
    {
        return view('livewire.app.setup.jabatan.index',[            
            'jabatans'=>$this->querySearch===null?
                Jabatan::paginate($this->paginate):
                Jabatan::where('id','like',"%".$this->querySearch."%")
                    ->orWhere('nama','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}
