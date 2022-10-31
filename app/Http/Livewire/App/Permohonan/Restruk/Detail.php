<?php

namespace App\Http\Livewire\App\Permohonan\Restruk;

use Livewire\Component;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\AdendumRequest;
use App\Models\InstallmentSystem;
use App\Models\InterestSystem;
use App\Models\LoanProduct;
use App\Models\LoanQuality;
use App\Models\UsageType;


class Detail extends Component
{

    public $noRekeningSearch=null;

    public $installmentSystems,$interestSystems,$loanProducts,$loanQualities,$usageType;
    public $customerData=Array(['name','cif','address','workAddress','identityId']);
    public $loanData=Array([
        'loanId',
        'customerId',
        'plafon',
        'interest',
        'provision',
        'period',
        'startDate',
        'dueDate',
        'loanCount',
        'installmentSystemId',
        'interestSystemId',
        'usageTypeId',
        'loanProductId',
        'qualityId',
        'outstanding',
        'loanArrear',
        'interestArrear',
        'loanArrearDay',
        'interestArrearDay',
        'penalty',
    ]);

    public $adendumRequestData=Array([
        'reg_number',
        'reg_date',
        'adendumOutstanding',
        'adendumInterest',
        'adendumPlafon',
        'adendumProvision',
        'adendumPeriod',
        'adendumStartDate',
        'adendumDueDate',
        'paymentPlan',
        'installmentSystemId',
        'interestSystemId',
        'analysisDate',
        'surveyorUserId',
        'kabagUserId',
        'surveyorReviewUserId',
        'legalUserId',
        'adendumRequestStatusId',
        'adendumRequestCommitteeId',
        'adendumRequestFileId',
        'loanId',
    ]);

    public function mount ($id)
    {
        //hehe
        $adendumRequest = adendumRequest::find($id);
        $this->adendumRequestId=$adendumRequestData->id;
        $this->reg_number=$adendumRequest->reg_number;
        $this->reg_date=$adendumRequestData->reg_date;
        $this->adendumOutstanding=$adendumRequestData->adendumOutstanding;
        $this->adendumInterest=$adendumRequestData->adendumInterest;
        $this->adendumPlafon=$adendumRequestData->adendumPlafon;
        $this->adendumProvision=$adendumRequestData->adendumProvision;
        $this->adendumPeriod=$adendumRequestData->adendumPeriod;
        $this->adendumStartDate=$adendumRequestData->adendumStartDate;
        $this->adendumDueDate=$adendumRequestData->adendumDueDate;
        $this->paymentPlan=$adendumRequestData->paymentPlan;
        $this->installmentSystemId=$adendumRequestData->installmentSystemId;
        $this->interestSystemId=$adendumRequestData->interestSystemId;
        $this->analysisDate=$adendumRequestData->analysisDate;
        $this->surveyorUserId=$adendumRequestData->surveyorUserId;
        $this->kabagUserId=$adendumRequestData->kabagUserId;
        $this->surveyorReviewUserId=$adendumRequestData->surveyorReviewUserId;
        $this->legalUserId=$adendumRequestData->legalUserId;
        $this->adendumRequestStatusId=$adendumRequestData->adendumRequestStatusId;
        $this->adendumRequestCommitteeId=$adendumRequestData->adendumRequestCommitteeId;
        $this->adendumRequestFileId=$adendumRequestData->adendumRequestFileId;
        $this->loanId=$adendumRequestData->loanId;
    }

    public function inquiryData()
    {
        $loan = Loan::where('loan_id','=',$this->noRekeningSearch)->get();
        if(empty($loan->items)){
            dd("nn");
        }else{
            dd("ada");
        }
    }

    public function update()
    {

        $this->validate([
            'customerData.name'=>'required',
            'customerData.cif'=>'required',

            'loanData.loanId'=>'required',
            'loanData.plafon'=>'required',
            'loanData.provision'=>'required',
            'loanData.interest'=>'required',
            'loanData.installmentSystemId'=>'required',
            'loanData.interestSystemId'=>'required',
            'loanData.period'=>'required',
            'loanData.outstanding'=>'required',
            'loanData.loanArrear'=>'required',
            'loanData.interestArrear'=>'required',
            'loanData.penalty'=>'required',

            'adendumRequestData.adendumOutstanding'=>'required',
            'adendumRequestData.adendumInterest'=>'required',
            'adendumRequestData.adendumInterest'=>'required',
            'adendumRequestData.adendumProvision'=>'required',
            'adendumRequestData.adendumPeriod'=>'required',
            'adendumRequestData.paymentPlan'=>'required',
        ]);
        // dd("ok");
        $customer = Customer::find($this->customerId)->update([
            'name'=>$this->customerData['name'],
            'cif'=>$this->customerData['cif'],
            'address'=>$this->customerData['address'],
            'work_address'=>$this->customerData['workAddress'],
            'identity_id'=>$this->customerData['identityId']
        ]);

        // dd($this->adendumRequestData);

        $adendumRequest = AdendumRequest::find($this->adendumRequestId)->update([
            'reg_number'=>12312,
            'reg_date'=>date('Y-m-d'),
            'adendum_outstanding'=>$this->adendumRequestData['adendumOutstanding'],
            'adendum_interest'=>$this->adendumRequestData['adendumInterest'],
            'adendum_plafon'=>$this->adendumRequestData['adendumOutstanding']+$this->adendumRequestData['adendumInterest'],
            'adendum_provision'=>$this->adendumRequestData['adendumProvision'],
            'adendum_period'=>$this->adendumRequestData['adendumPeriod'],
            'adendum_start_date'=>$this->adendumRequestData['adendumStartDate'],
            'adendum_due_date'=>$this->adendumRequestData['adendumDueDate'],
            'payment_plan'=>$this->adendumRequestData['paymentPlan'],
            'installment_system_id'=>$this->adendumRequestData['installmentSystemId'],
            'interest_system_id'=>$this->adendumRequestData['interestSystemId'],
            'loan_id'=>$this->loanData['loanId'],
        ]);

        $loan = Loan::find($this->loanId)->update([
            'loan_id'=>$this->loanData['loanId'],
            'customer_id'=>'1231231',
            'plafon'=>$this->loanData['plafon'],
            'interest'=>$this->loanData['interest'],
            'provision'=>$this->loanData['provision'],
            'period'=>$this->loanData['period'],
            'start_date'=>$this->loanData['startDate'],
            'due_date'=>$this->loanData['dueDate'],
            'loan_count'=>$this->loanData['loanCount'],
            'installment_system_id'=>$this->loanData['installmentSystemId'],
            'interest_system_id'=>$this->loanData['interestSystemId'],
            'usage_type_id'=>$this->loanData['usageTypeId'],
            'loan_product_id'=>$this->loanData['loanProductId'],
            'quality_id'=>$this->loanData['qualityId'],
            'outstanding'=>$this->loanData['outstanding'],
            'loan_arrear'=>$this->loanData['loanArrear'],
            'interest_arrear'=>$this->loanData['interestArrear'],
            'loan_arrear_day'=>$this->loanData['loanArrearDay'],
            'interest_arrear_day'=>$this->loanData['interestArrearDay'],
            'penalty'=>$this->loanData['penalty'],
        ]);

        if($adendumRequest){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data permohonan',
                'type'=>'success'
            ]);
            return redirect()->route('retruk');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data permohonan',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->installmentSystems = InstallmentSystem::all();
        $this->interestSystems = InterestSystem::all();
        $this->loanProducts = LoanProduct::all();
        $this->loanQualities = LoanQuality::all();
        $this->usageTypes = UsageType::all();
        return view('livewire.app.permohonan.restruk.detail')->extends('layouts.master');
    }
}
