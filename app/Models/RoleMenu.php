<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Role;

class RoleMenu extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
