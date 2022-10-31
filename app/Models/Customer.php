<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;
use App\Models\MaritalStatus;
use App\Models\ResidenceStatus;
use App\Models\JobType;
use App\Models\KotaKab;
use App\Models\Office;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function office()
    {
        return $this->belongsTo(Office::class,'office_code','office_code');
    }

    public function loans()
    {
        return $this->belongsToMany(Loan::class,'cif','cif');
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function residenceStatus()
    {
        return $this->belongsTo(ResidenceStatus::class);
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function kota_kab()
    {
        return $this->belongsTo(KotaKab::class,'kota_kab_code','code');
    }
}
