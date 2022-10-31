<?php

namespace App\Models;

use App\Models\Collateral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InsuranceStatus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function collateral()
    {
        return $this->belongsToMany(Collateral::class,'id','insurance_status_code');
    }
    
}
