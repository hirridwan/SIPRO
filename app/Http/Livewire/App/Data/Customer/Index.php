<?php

namespace App\Http\Livewire\App\Data\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;

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

    public function deleteConfirm($id,$cif)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data kredit '.$cif. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $customer = Customer::find($id)->delete();

        if($customer){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data nasabah',
                'type'=>'success'
            ]);
            return redirect()->route('data.nasabah');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data nasabah',
                'type'=>'error'
            ]);
            return redirect()->route('data.nasabah');
        }
    }
    public function render()
    {
        return view('livewire.app.data.customer.index',[            
            'customers'=>$this->querySearch===null?
                Customer::paginate($this->paginate):
                Customer::where('cif','like',"%".$this->querySearch."%")
                    ->orWhere('name','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}