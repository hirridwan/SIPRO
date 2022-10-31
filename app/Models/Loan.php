<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdendumRequest;
use App\Models\Collateral;
use App\Models\MaritalStatus;
use App\Models\ResidenceStatus;
use App\Models\Customer;
use App\Models\InstallmentType;
use App\Models\InterestType;
use App\Models\LoanQuality;
use App\Models\Office;
use App\Models\UsageType;

class Loan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function office()
    {
        return $this->belongsTo(Office::class,'office_code','code');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'cif','cif');
    }

    public function adendumRequests()
    {
        return $this->belongsToMany(AdendumRequest::class);
    }

    public function collaterals()
    {
        return $this->belongsToMany(Collateral::class,'loan_collateral','loan_id','agunan_id');
    }

    public function installment_type()
    {
        return $this->belongsTo(InstallmentType::class,'installment_type_code','code');
    }

    public function interest_type()
    {
        return $this->belongsTo(InterestType::class,'interest_type_code','code');
    }

    public function loan_quality()
    {
        return $this->belongsTo(Quality::class);
    }

    public function usage_type()
    {
        return $this->belongsTo(UsageType::class,'usage_type_code','code');
    }
}
