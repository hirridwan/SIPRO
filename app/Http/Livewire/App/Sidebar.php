<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleMenu;
use Auth;

class Sidebar extends Component
{
    public $appName;
    public $appShortName;
    public $groupMenus=array();
    public $dropdownState='';

    public $roles,$users,$menus,$roleMenus;

    public function dropdownClick()
    {
        $this->dropdownState='active';
    }
    public function mount()
    {
        $this->appName = config('app.name');
        $this->appShortName = config('app.shortname');

    }
    
    public function render()
    {
        $this->role=Role::find(Auth::user()->role->id);
        $this->menus=Menu::all();
        $this->roleMenus = RoleMenu::where('role_id','=',Auth::user()->role->id)->select('menu_id')->get()->pluck('menu_id')->toArray();
        return view('livewire.app.sidebar');
    }
}
