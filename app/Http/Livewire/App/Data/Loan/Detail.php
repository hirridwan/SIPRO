<?php

namespace App\Http\Livewire\App\Data\Loan;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Repositories\Helper;
use App\Models\Office;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\UsageType;
use App\Models\LoanQuality;
use App\Models\LoanProduct ;
use App\Models\InterestSystem;
use App\Models\InstallmentSystem;


class Detail extends Component
{
    public $loan,
    $loan_id,
    $customer_id,
    $plafon,
    $interest,
    $provision,
    $period,
    $start_date,
    $due_date,
    $loan_count,
    $installment_system_code,
    $interest_system_code,
    $usage_type_code,
    $loan_product_code,
    $quality_id,
    $outstanding,
    $loan_arrear,
    $loan_arrear_day,
    $interest_arrear,
    $penalty;

    public $cif;
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
    public function mount($id)
    {
        $helper = new Helper;
        $loan = Loan::find($id);

        $this->loan=$loan;
        $this->cif = $loan->customer->cif;
        $this->customerData['cif']=$loan->customer_id;
        $this->customerData['name']=$loan->customer->name;
        $this->customerData['address']=$loan->customer->address;
        $this->officeCode = $loan->office->code;
        $this->loan_id=$loan->loan_id;
        $this->cif=$loan->cif;
        $this->plafon=number_format($loan->plafon,'2',',','.');
        $this->interest=$loan->interest;
        $this->provision=$loan->provision;
        $this->period=$loan->period;
        $this->start_date=$loan->start_date;
        $this->due_date=$loan->due_date;
        $this->loan_count=$loan->loan_count;
        $this->installment_system_code=$loan->installment_system_code;
        $this->interest_system_code=$loan->interest_system_code;
        $this->usage_type_code=$loan->usage_type_code;
        $this->loan_product_code=$loan->loan_product_code;
        $this->quality_id=$loan->quality_id;
        $this->outstanding=number_format($loan->outstanding,'2',',','.');
        $this->loan_arrear=number_format($loan->loan_arrear,'2',',','.');
        $this->loan_arrear_day=$loan->loan_arrear_day;
        $this->interest_arrear=number_format($loan->interest_arrear,'2',',','.');
        $this->interest_arrear_day=$loan->interest_arrear_day;
        $this->penalty=number_format($loan->penalty,'2',',','.');
    }

    public function update()
    {
        $helper = new Helper;
        $this->validate([
            'officeCode'=>'required',
            // 'loan_id'=>['required',Rule::unique('loans')->ignore($this->loan->loan_id)],
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
            'penalty'=>'required',
        ]);
        // dd('here');
        $loan = Loan::find($this->loan->id)->update([
            'office_code'=>$this->officeCode,
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
            'interest_arrear_day'=>$this->interest_arrear_day,
            'penalty'=>$helper->toDecimalFormat($this->penalty),
        ]);

        if($loan){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data kredit',
                'type'=>'success'
            ]);
            return redirect()->route('data.kredit');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data kredit',
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
        return view('livewire.app.data.loan.detail')->extends('layouts.master');
    }
}
