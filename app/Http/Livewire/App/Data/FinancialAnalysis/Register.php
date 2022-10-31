<?php

namespace App\Http\Livewire\App\Data\FinancialAnalysis;

use Livewire\Component;
use App\Repositories\Helper;
use App\Models\FinancialAnalysis;
use App\Models\Loan;
use App\Models\AdendumRequest;
use App\Models\FinancialAnalysisCode;
use App\Models\FinancialAnalysisDetail;

class Register extends Component
{
    
    public $adendumRequestData;
    public $analysis_type_code;
    public $analysis_type_name;
    public $analysis_sub_type_code;
    public $analysisDetails;
    public $financialAnalysisDetailData;
    public $details;
    public $cif;
    public $pendapatan=Array();
    public $pengeluaran=Array();
    public $kas;

    public function mount($id)
    {
        $this->financialAnalysisDetailData = new Collection();
        $this->analysis_type_code='1';
        $adendumRequest = AdendumRequest::find($id);
        $this->adendumRequestData['id']=$adendumRequest->id;
        $this->adendumRequestData['loan_id']=$adendumRequest->loan->loan_id;
        $this->adendumRequestData['reg_number']=$adendumRequest->loan->loan_id;
        $this->adendumRequestData['name']=$adendumRequest->loan->customer->name;
        $this->adendumRequestData['address']=$adendumRequest->loan->customer->address;
        $this->adendumRequestData['analysis_count']=$adendumRequest->analysis_count;
    }
    public function store()
    {
        $analysisCount = AdendumRequest::find($this->adendumRequestData['id'])->pluck('analysis_count');
    }
    public function addDetail()
    {
        // dd($this->financialAnalysisDetailData);
        $helper = new Helper;
        $analysisDetailsRegNumber= $helper->createNomorAnalisa($this->adendumRequestData['loan_id'],$this->adendumRequestData['analysis_count']);
        $this->details->push(new FinancialAnalysisDetail([
            "financial_analysis_reg_number"=>$analysisDetailsRegNumber,
            "financial_analysis_code"=>$this->financialAnalysisDetailData['financial_analysis_code'],
            "nominal"=>$this->financialAnalysisDetailData['nominal'],
            "description"=>$this->financialAnalysisDetailData['description']
        ]));
        dd($this->details);
    }

    public function render()
    {
        $analysisTypes=FinancialAnalysisCode::where('level',1)->where('status',1)->get();
        $analysisSubTypes=FinancialAnalysisCode::where('level','>=',1)->where('status','=',1)->where('is_parent',0)->whereRaw('left(parent_code,1)=?',[$this->analysis_type_code])->get();
        $analysisTypeName=FinancialAnalysisCode::where('level',1)->where('code',$this->analysis_type_code)->where('status',1)->get();
        return view('livewire.app.data.financial-analysis.register',[
            "analysisTypes"=>$analysisTypes,
            "analysisSubTypes"=>$analysisSubTypes,
            "analysisTypeName"=>$analysisTypeName[0]->name
        ])->extends('layouts.master');
    }
}
