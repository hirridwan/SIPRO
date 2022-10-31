<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Pegawai;

class Office extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany(User::class);
    } 

    public function customer()
    {
        return $this->belongsToMany(Customer::class,'code','office_code');
    }

    public function loan()
    {
        return $this->belongsToMany(Loan::class,'code','office_code');
    }

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class,'code','office_code');
    }

    public function rapat()
    {
        return $this->belongsToMany(Rapat::class,'code','office_code');
    }
}