<?php

namespace App\Http\Livewire\App\Menu;

use Livewire\Component;
use App\Models\Menu;

class Register extends Component
{
    public $menuId,$name,$routeName,$icon,$parentId=0,$isActive=1;
    public $parentMenus;

    public function store()
    {
        $this->validate([
            'name'=>'required',
            'parentId'=>'required',
            'isActive'=>'required',
        ]);

        $menu=Menu::create([
            'name'=>$this->name,
            'route_name'=>$this->routeName,
            'icon'=>$this->icon,
            'parent_id'=>$this->parentId,
            'is_active'=>$this->isActive,
        ]);

        if($menu){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data menu',
                'type'=>'success'
            ]);
            return redirect()->route('setup.menus');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data menu',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->parentMenus=Menu::where('parent_id','=',0)->get();
        return view('livewire.app.menu.register')->extends('layouts.master');
    }
}
