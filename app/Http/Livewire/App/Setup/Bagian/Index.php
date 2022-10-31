<?php

namespace App\Http\Livewire\App\Setup\Bagian;

use Livewire\Component;
use Livewire\WithPagination;
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

    public function deleteConfirm($id,$bagian)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data bagian '.$bagian. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $bagian = Bagian::find($id)->delete();

        if($bagian){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data bagian',
                'type'=>'success'
            ]);
            return redirect()->route('setup.bagian');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data bagian',
                'type'=>'error'
            ]);
            return redirect()->route('setup.bagian');
        }
    }

    public function render()
    {
        $bagian=Bagian::all();
        return view('livewire.app.setup.bagian.index',[            
            'bagians'=>$this->querySearch===null?
                Bagian::paginate($this->paginate):
                Bagian::where('id','like',"%".$this->querySearch."%")
                    ->orWhere('nama','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}
