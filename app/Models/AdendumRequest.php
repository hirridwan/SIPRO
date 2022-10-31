<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;
use App\Models\Committee;
use App\Models\AdendumType;
use App\Models\AdendumStatus;

class AdendumRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function loan()
    {
        return $this->belongsTo(Loan::class,'loan_id','loan_id');
    }

    public function committees()
    {
        return $this->belongsToMany(Committee::class);
    }

    public function adendum_type()
    {
        return $this->belongsTo(AdendumType::class);
    }

    public function adendum_status()
    {
        return $this->belongsTo(AdendumStatus::class);
    }
}
