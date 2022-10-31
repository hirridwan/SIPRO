<?php

namespace App\Http\Livewire\App\Data\Loan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Loan;
use Auth;

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

    public function deleteConfirm($id,$loan_id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data kredit '.$loan_id. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $loan = Loan::find($id)->delete();

        if($loan){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data kredit',
                'type'=>'success'
            ]);
            return redirect()->route('data.kredit');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data kredit',
                'type'=>'error'
            ]);
            return redirect()->route('data.kredit');
        }
    }
    public function render()
    {
        $loan=Loan::all();
        return view('livewire.app.data.loan.index',[            
            'loans'=>$this->querySearch===null?
                Loan::paginate($this->paginate):
                Loan::where('loan_id','like',"%".$this->querySearch."%")
                    ->orWhere('cif','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}