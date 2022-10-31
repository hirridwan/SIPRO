<?php

namespace App\Http\Livewire\App\Data\Loan;

use Livewire\Component;
use App\Repositories\Helper;
use App\Models\Office;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\UsageType;
use App\Models\LoanQuality;
use App\Models\LoanProduct;
use App\Models\InterestSystem;
use App\Models\InstallmentSystem;


class Register extends Component
{

    protected $listeners = ['inputDataNasabah','updateKotaKab'];

    public $officeId;
    public $cif;
    public $loan_id;
    public $customer_id;
    public $plafon;
    public $interest;
    public $provision;
    public $period;
    public $start_date;
    public $due_date;
    public $loan_count;
    public $installment_system_code;
    public $interest_system_code;
    public $usage_type_code;
    public $loan_product_code;
    public $quality_id;
    public $outstanding;
    public $loan_arrear;
    public $loan_arrear_day;
    public $interest_arrear;
    public $interest_arrear_day;
    public $penalty;

    public function inputDataNasabah()
    {
        return redirect()->route('data.nasabah.register');
    }

    public $customerData=Array([
        'id',
        'cif',
        'name',
        'address'
    ]);

    public function getCif()
    {
        $customerData = Customer::where('cif',$this->cif)->get()->toArray();
        if(!empty($customerData))
        {
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Data Nasabah Ditemukan!',
                'text'=>$customerData[0]['name']." - ".$customerData[0]['address'],
                'type'=>'success',
            ]);
            $this->customer_id=$customerData[0]['cif'];
            $this->customerData['id']=$customerData[0]['id'];
            $this->customerData['name']=$customerData[0]['name'];
            $this->customerData['address']=$customerData[0]['address'];
        }else{
            $this->dispatchBrowserEvent('swal:redirect-page',[
                'title'=>'Data Nasabah Tidak Ditemukan!',
                'text'=>'Input Data Nasabah Sekarang?',
                'type'=>'error',
                'routeDestination'=>'inputDataNasabah'
            ]);
            $this->customer_id='';
            $this->customerData['id']='';
            $this->customerData['name']='';
            $this->customerData['address']='';
        }
    }

    public function store()
    {
        $helper = new Helper;
        $this->validate([
            'officeId'=>'required',
            'loan_id'=>'required',
            'cif'=>'required',
            'plafon'=>'required',
            'interest'=>'required',
            'provision'=>'required',
            'period'=>'required',
            'start_date'=>'required',
            'due_date'=>'required',
            'loan_count'=>'required',
            'installment_system_code'=>'required',
            'interest_system_code'=>'required',
            'usage_type_code'=>'required',
            'loan_product_code'=>'required',
            'quality_id'=>'required',
            'outstanding'=>'required',
            'loan_arrear'=>'required',
            'loan_arrear_day'=>'required',
            'interest_arrear'=>'required',
            'interest_arrear_day'=>'required',
            'penalty'=>'required'
        ]);
    
        $loan = Loan::create([
            'office_id'=>$this->officeId,
            'loan_id'=>$this->loan_id,
            'cif'=>$this->cif,
            'plafon'=>$helper->toDecimalFormat($this->plafon),
            'interest'=>$this->interest,
            'provision'=>$this->provision,
            'period'=>$this->period,
            'start_date'=>$this->start_date,
            'due_date'=>$this->due_date,
            'loan_count'=>$this->loan_count,
            'installment_system_code'=>$this->installment_system_code,
            'interest_system_code'=>$this->interest_system_code,
            'usage_type_code'=>$this->usage_type_code,
            'loan_product_code'=>$this->loan_product_code,
            'quality_id'=>$this->quality_id,
            'outstanding'=>$helper->toDecimalFormat($this->outstanding),
            'loan_arrear'=>$helper->toDecimalFormat($this->loan_arrear),
            'loan_arrear_day'=>$this->loan_arrear_day,
            'interest_arrear'=>$helper->toDecimalFormat($this->interest_arrear),
            'interest_arrear_day'=>$this->interest_arrear,
            'penalty'=>$helper->toDecimalFormat($this->penalty)
        ]);
        
        if($loan){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data kredit',
                'type'=>'success'
            ]);
            return redirect()->route('data.kredit');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data kredit',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->offices = Office::where('code','!=','00')->get();
        $this->interestSystems = InterestSystem::all();
        $this->installmentSystems = InstallmentSystem::all();
        $this->usageTypes = UsageType::all();
        $this->loanQualities = LoanQuality::all();
        $this->loanProducts = LoanProduct::all();

        return view('livewire.app.data.loan.register')->extends('layouts.master');
    }
}