<?php

namespace App\Http\Livewire\App\Office;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Office;

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

    public function deleteConfirm($id,$name)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data kantor '.$name. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $office = Office::find($id)->delete();

        if($office){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data kantor',
                'type'=>'success'
            ]);
            return redirect()->route('setup.offices');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data kantor',
                'type'=>'error'
            ]);
            return redirect()->route('setup.offices');
        }
    }
    public function render()
    {
        return view('livewire.app.office.index',[            
            'offices'=>$this->querySearch===null?
                Office::paginate($this->paginate):
                Office::where('name','like',"%".$this->querySearch."%")
                    ->orWhere('shortname','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}