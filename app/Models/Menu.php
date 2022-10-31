<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\Menu;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getParentName($id)
    {
        $parentName = Menu::find($id);

        if(!empty($parentName))
            return $parentName->name;
        else 
            return "";
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_menus','menu_id','role_id');
    }

}
