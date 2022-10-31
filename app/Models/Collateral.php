<?php

namespace App\Models;

use App\Models\Loan;
use App\Models\CollateralType;
use App\Models\InsuranceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collateral extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function loans()
    {
        return $this->belongsTo(Loan::class,'loan_collateral','collateral_id','loan_id');
    }

    public function collateral_type()
    {
        return $this->belongsTo(CollateralType::class,'code','collateral_type_code');
    }

    public function insurance_status()
    {
        return $this->belongsTo(InsuranceStatus::class,'code','insurance_status_code');
    }
}
