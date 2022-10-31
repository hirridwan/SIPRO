<?php

namespace App\Http\Livewire\App\Data\FinancialAnalysis;

use Livewire\Component;
use App\Models\AdendumRequest;
use App\Models\FinancialAnalysis;

class DataAnalisa extends Component
{
    public $financialAnalyses;
    public $analysisDetails;
    public $adendumRequestData;

    public function mount($id)
    {
        $adendumRequest=AdendumRequest::find($id);
        $this->adendumRequestData['id']=$adendumRequest->id;
        $this->adendumRequestData['reg_number']=$adendumRequest->reg_number;
        $this->adendumRequestData['loan_id']=$adendumRequest->loan->loan_id;
        $this->adendumRequestData['name']=$adendumRequest->loan->customer->name;
        $this->adendumRequestData['address']=$adendumRequest->loan->customer->address;
        $this->financialAnalyses = FinancialAnalysis::where('loan_id',$this->adendumRequestData['loan_id'])->get();
    }

    public function storeAnalsisData()
    {
    }

    public function render()
    {
        return view('livewire.app.data.financial-analysis.data-analisa')->extends('layouts.master');
    }
}
