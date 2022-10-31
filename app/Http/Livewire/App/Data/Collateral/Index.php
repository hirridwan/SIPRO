<?php

namespace App\Http\Livewire\App\Data\Collateral;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collateral;

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

    public function deleteConfirm($id,$agunan_id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data agunan '.$agunan_id. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $collateral = Collateral::find($id)->delete();

        if($collateral){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data agunan',
                'type'=>'success'
            ]);
            return redirect()->route('data.agunan');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data agunan',
                'type'=>'error'
            ]);
            return redirect()->route('data.agunan');
        }
    }
    public function render()
    {
        return view('livewire.app.data.collateral.index',[            
            'collaterals'=>$this->querySearch===null?
                Collateral::paginate($this->paginate):
                Collateral::where('agunan_id','like',"%".$this->querySearch."%")
                    ->orWhere('jenis_agunan','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}