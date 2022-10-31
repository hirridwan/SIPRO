<?php

namespace App\Http\Livewire\App\Role;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\RoleMenu;
use App\Models\Menu;

class Detail extends Component
{
    public $roleId,$description,$shortname,$authorityLevel;
    public $roles,$users,$menus,$roleMenus;
    public $selectedMenus=Array(),$selectedParentMenus=Array(),$roleParentMenus;

    public function mount($id)
    {
        $this->roleId=$id;
        $role = Role::find($id);
        $this->description = $role->description;
        $this->shortname = $role->shortname;
        $this->authorityLevel = $role->authority_level;

    }

    public function update()
    {
        $this->validate([
            'description'=>'required',
            'shortname'=>'required',
        ]);

        $role = Role::find($this->roleId)->update([
            'description'=>$this->description,
            'shortname'=>$this->shortname,
            'authority_level'=>$this->authorityLevel
        ]);
        
        if($role){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data role',
                'type'=>'success'
            ]);
            return redirect()->route('setup.roles');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data role',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function updateSelectedParentMenus($id)
    {
        if(!in_array($id,$this->selectedParentMenus))
        {
            $this->selectedParentMenus[$id]=$id;
        }
    }

    public function updateSelectedMenus($id)
    {
        if(!in_array($id,$this->selectedMenus))
        {
            $this->selectedMenus[$id]=$id;
        }
    }

    public function roleMenuUpdate()
    {
        // dd($this->selectedMenus);
        RoleMenu::where('role_id',$this->roleId)->delete();
    //    dd($this->selectedMenus);
        // dd($this->roleParentMenus);
        foreach($this->selectedParentMenus as $selectedParentMenu)
        {
             if($selectedParentMenu)
             {
                 $newParentMenu[$selectedParentMenu]['role_id']=$this->roleId;
                 $newParentMenu[$selectedParentMenu]['menu_id']=$selectedParentMenu;
             }   
        }
       foreach($this->selectedMenus as $selectedMenu)
       {
            if($selectedMenu)
            {
                $newMenu[$selectedMenu]['role_id']=$this->roleId;
                $newMenu[$selectedMenu]['menu_id']=$selectedMenu;
            }   
       }

        $newRoleMenus = array_merge($newMenu,$newParentMenu);

        // dd($newRoleMenus);
        
        $roleMenu=RoleMenu::insert($newRoleMenus);

        if($roleMenu){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update menu role '.$this->description,
                'type'=>'success'
            ]);
            return redirect()->route('setup.roles');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update menu role '.$this->description,
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }

    }   
    public function render()
    {
        $this->role=Role::find($this->roleId);
        $this->menus=Menu::all();
        // dd($this->role->menus);
        foreach($this->role->menus as $roleParentMenus)
        {
            if($roleParentMenus->parent_id==0)
            {
                $this->roleParentMenus[$roleParentMenus->id]['parent'] = true;
                $this->roleParentMenus[$roleParentMenus->id]['id'] = $roleParentMenus->id;
                $this->roleParentMenus[$roleParentMenus->id]['name'] = $roleParentMenus->name;
                $this->roleParentMenus[$roleParentMenus->id]['icon'] = $roleParentMenus->icon;
                $this->roleParentMenus[$roleParentMenus->id]['parent_id'] = $roleParentMenus->parent_id;
            }
        }
        
        // dd($this->roleParentMenus);

        foreach($this->role->menus as $roleMenus)
        {
            if($roleMenus->parent_id>0)
            {
                $this->roleMenus[$roleMenus->id]['parent'] = false;
                $this->roleMenus[$roleMenus->id]['id'] = $roleMenus->id;
                $this->roleMenus[$roleMenus->id]['name'] = $roleMenus->name;
                $this->roleMenus[$roleMenus->id]['icon'] = $roleMenus->icon;
                $this->roleMenus[$roleMenus->id]['parent_id'] = $roleMenus->parent_id;
            }
        }

        // dd($this->roleMenus);
        // dd(array_merge($this->roleParentMenus,$this->roleMenus));
        // $this->roleMenus = RoleMenu::where('role_id','=',$this->roleId)->select('menu_id')->get()->pluck('menu_id')->toArray();
        // dd($this->roleMenus);

        // dd($this->roleMenus);
        // foreach($this->roleMenus as $key=>$roleMenu)
        // {
        //     $this->selectedMenus[$roleMenu]=$roleMenu;
        // }
        // dd($this->selectedMenus);
        return view('livewire.app.role.detail')->extends('layouts.master');
    }
}
