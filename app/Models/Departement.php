<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Departement extends Model
{
    use HasFactory;

    public $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
