<?php

namespace App\Models;

use App\Models\Collateral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollateralType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function collateral()
    {
        return $this->belongsToMany(Collateral::class,'id','collateral_type_code');
    }
}