<?php

namespace App\Http\Livewire\App\Role;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
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
            'text'=>'Yakin akan menghapus data role '.$name. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $role = Role::find($id)->delete();

        if($role){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data role',
                'type'=>'success'
            ]);
            return redirect()->route('setup.roles');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data role',
                'type'=>'error'
            ]);
            return redirect()->route('setup.roles');
        }
    }

    public function render()
    {
        return view('livewire.app.role.index',[
            'roles'=>$this->querySearch===null?
                Role::paginate($this->paginate):
                Role::where('description','like',"%".$this->querySearch."%")
                    ->orWhere('shortname','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}
