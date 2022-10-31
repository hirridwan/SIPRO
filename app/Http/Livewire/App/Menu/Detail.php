<?php

namespace App\Http\Livewire\App\Menu;

use Livewire\Component;
use App\Models\Menu;

class Detail extends Component
{
    public $menuId,$name,$routeName,$icon,$parentId,$isActive;

    public function mount($id)
    {
        $this->menuId=$id;
        $menu = Menu::find($id);
        $this->name = $menu->name;
        $this->routeName = $menu->route_name;
        $this->icon = $menu->icon;
        $this->parentId=$menu->parent_Id;
        $this->isActive=$menu->is_active;
    }

    public function update()
    {
        $this->validate([
            'name'=>'required',
            'routeName'=>'required',
        ]);

        $menu = Menu::find($this->menuId)->update([
            'name'=>$this->name,
            'route_name'=>$this->routeName,
            'icon'=>$this->icon,
            'parent_id'=>$this->parentId,
            'is_active'=>$this->isActive
        ]);
        
        if($menu){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data menu',
                'type'=>'success'
            ]);
            return redirect()->route('setup.menus');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data menu',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.app.menu.detail',[
            'parentMenus'=>Menu::where('parent_id','=','0')->get()
        ])->extends('layouts.master');
    }
}
