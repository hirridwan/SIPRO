<?php

namespace App\Http\Livewire\App\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

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

    public function deleteConfirm($id,$name)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data user '.$name. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $user = User::find($id)->delete();

        if($user){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data user',
                'type'=>'success'
            ]);
            return redirect()->route('users');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data user',
                'type'=>'error'
            ]);
            return redirect()->route('users');
        }
    }

    public function render()
    {
        return view('livewire.app.user.index',[
            'users'=>$this->querySearch===null?
                User::paginate($this->paginate):
                User::where('name','like',"%".$this->querySearch."%")
                    ->orWhere('fullname','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}