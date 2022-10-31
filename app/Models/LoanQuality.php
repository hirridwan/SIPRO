<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;

class LoanQuality extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function loan()
    {
        return $this->belongsToMany(Loan::class);
    }
}
