<?php

namespace App\Http\Livewire\App\Permohonan\Restruk;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Loan;
use App\Models\Office;
use App\Models\Customer;
use App\Models\AdendumRequest;
use App\Models\InterestArrearTreatment;
use App\Models\InstallmentSystem;
use App\Models\InterestSystem;
use App\Models\LoanProduct;
use App\Models\LoanQuality;
use App\Models\UsageType;
use App\Models\LastRequestNumber;
use App\Repositories\Helper;

class Register extends Component
{
    
    public $noRekeningSearch=null;

    public $installmentSystems,$interestSystems,$loanProducts,$loanQualities,$usageType;
    public $customerData;
    public $loanData;
    public $adendumRequestData=['paymentPlan'=>0];

    public $loan_id;
    public function getLoanData()
    {
        $loan = Loan::where('loan_id','=',$this->loan_id)->first();
        // dd($loan->usage_type);
        $this->customerData['cif']=$loan->customer->cif;
        $this->customerData['name']=$loan->customer->name;
        $this->customerData['address']=$loan->customer->address;
        $this->customerData['identityId']=$loan->customer->identity_id;
        $this->loanData['id']=$loan->id;
        $this->loanData['loanId']=$loan->loan_id;
        $this->loanData['cif']=$loan->customer->id;
        $this->loanData['plafon']=$loan->plafon;
        $this->loanData['interest']=$loan->interest;
        $this->loanData['provision']=$loan->provision;
        $this->loanData['period']=$loan->period;
        $this->loanData['startDate']=$loan->start_date;
        $this->loanData['dueDate']=$loan->due_date;
        $this->loanData['loanCount']=$loan->loan_count;
        $this->loanData['installmentSystemCode']=$loan->installment_system_code;
        $this->loanData['interestSystemCode']=$loan->interest_system_code;
        $this->loanData['usageTypeCode']=$loan->usage_type_code;
        $this->loanData['loanProductCode']=$loan->loan_product_code;
        $this->loanData['qualityId']=$loan->quality_id;
        $this->loanData['outstanding']=$loan->outstanding;
        $this->loanData['loanArrear']=$loan->loan_arrear;
        $this->loanData['interestArrear']=$loan->interest_arrear;
        $this->loanData['loanArrearDay']=$loan->loan_arrear_day;
        $this->loanData['interestArrearDay']=$loan->interest_arrear_day;
        $this->loanData['penalty']=$loan->penalty;
        $this->adendumRequestData['officeCode']=$loan->office->code;

        // dd($this->loanData);

    }

    public function store()
    {
        $this->validate([
            'loanData.outstanding'=>'required',
            'loanData.interest'=>'required',
            'loanData.provision'=>'required',
            'loanData.period'=>'required',
            'loanData.startDate'=>'required',
            'loanData.dueDate'=>'required',
            'loanData.installmentSystemCode'=>'required',
            'loanData.interestSystemCode'=>'required',
            'loanData.loanId'=>['required',Rule::unique('adendum_requests', 'loan_id')->ignore($this->loanData['loanId']),],
        ]);

        $lastNumber = LastRequestNumber::where('office_code',$this->adendumRequestData['officeCode'])->get();
        $helper = new Helper;
        $regNumber = $helper->getRegisterNumber($lastNumber[0]->last_number,$this->adendumRequestData['officeCode'],date('Y-m-d'));
        $reqCode = $this->adendumRequestData['officeCode'].'.'.date('Ymd').'.'.$this->loanData['loanId'];
        $adendumRequest = AdendumRequest::create([
            'reg_number'=>$regNumber,
            'reg_date'=>date('Y-m-d'),
            'request_code'=>$reqCode,
            'old_outstanding'=>$this->loanData['outstanding'],
            'old_interest'=>$this->loanData['interest'],
            'old_plafon'=>$this->loanData['outstanding']+$this->loanData['interest'],
            'old_provision'=>$this->loanData['provision'],
            'old_period'=>$this->loanData['period'],
            'old_start_date'=>$this->loanData['startDate'],
            'old_due_date'=>$this->loanData['dueDate'],
            'old_installment_system_code'=>$this->loanData['installmentSystemCode'],
            'old_interest_system_code'=>$this->loanData['interestSystemCode'],
            'loan_id'=>$this->loanData['loanId'],
            'payment_plan'=>$this->adendumRequestData['paymentPlan'],
            'adendum_status_id'=>1,
        ]);
        
        // update nomor register terakhir

        LastRequestNumber::where('office_code',$this->adendumRequestData['officeCode'])->update([
            'last_number'=>$lastNumber[0]->last_number+1
        ]);

        if($adendumRequest){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data permohonan'.'<br>'.'Nomor Permohonan : '.$regNumber,
                'type'=>'success'
            ]);
            return redirect()->route('restruk');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data permohonan',
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
        $this->offices = Office::all();
        $this->interestArrearTreatments = InterestArrearTreatment::all();
        return view('livewire.app.permohonan.restruk.register')->extends('layouts.master');
    }
}
