<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinancialAnalysisDetail;

class FinancialAnalysis extends Model
{
    use HasFactory;

    protected $guard =[];

    public function details()
    {
        return $this->belongsTo(FinancialAnalysisDetail::class,'analysis_code','financial_analysis_code');
    }
}
