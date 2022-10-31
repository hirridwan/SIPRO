<?php

namespace App\Http\Livewire\App\Menu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Menu;

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
            'text'=>'Yakin akan menghapus data role '.$name. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $menu = Menu::find($id)->delete();

        if($menu){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data menu',
                'type'=>'success'
            ]);
            return redirect()->route('setup.menus');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data menu',
                'type'=>'error'
            ]);
            return redirect()->route('setup.menus');
        }
    }

    public function render()
    {
        return view('livewire.app.menu.index',[
            'menus'=>$this->querySearch===null?
                Menu::paginate($this->paginate):
                Menu::where('name','like',"%".$this->querySearch."%")
                    ->orWhere('route_name','like',"%".$this->querySearch."%")->paginate($this->paginate),
        ])->extends('layouts.master');
    }
}
