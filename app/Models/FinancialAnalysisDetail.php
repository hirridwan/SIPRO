<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinancialAnalysis;

class FinancialAnalysisDetail extends Model
{
    use HasFactory;

    protected $guard =[];
    protected $fillable = [
        'financial_analysis_id',
    ];

    public function financial_analysis()
    {
        return $this->belongsToMany(FinancialAnalysis::class,'financial_analysis_code','analysis_code');
    }
}
