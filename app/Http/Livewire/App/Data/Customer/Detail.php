<?php

namespace App\Http\Livewire\App\Data\Customer;

use App\Models\JobType;
use App\Models\KotaKab;
use Livewire\Component;
use App\Models\Customer;
use App\Models\MaritalStatus;
use Symfony\Component\Console\Input\Input;


class Detail extends Component
{
    public $customer_id,
    $cif,
    $name,
    $address,
    $kota_kab_code,
    $kecamatan,
    $desa,
    $postal_code,
    $identity_id,
    $family_card_id,
    $married_certificate_id,
    $tax_identification_number,
    $birth_place,
    $birth_date,
    $mother_name,
    $work_address,
    $job_type_id,
    $job_description,
    $job_title,
    $company_name,
    $working_period,
    $side_job,
    $marital_status_id;

    public function mount($id)
    {
        $customer = Customer::find($id);

        $this->customerId=$customer->id;
        $this->cif=$customer->cif;
        $this->name=$customer->name;
        $this->address=$customer->address;
        $this->kota_kab_code=$customer->kota_kab_code;
        $this->kecamatan=$customer->kecamatan;
        $this->desa=$customer->desa;
        $this->postal_code=$customer->postal_code;
        $this->identity_id=$customer->identity_id;
        $this->family_card_id=$customer->family_card_id;
        $this->married_certificate_id=$customer->married_certificate_id;
        $this->tax_identification_number=$customer->tax_identification_number;
        $this->birth_place=$customer->birth_place;
        $this->birth_date=$customer->birth_date;
        $this->mother_name=$customer->mother_name;
        $this->work_address=$customer->work_address;
        $this->job_type_id=$customer->job_type_id;
        $this->job_description=$customer->job_description;
        $this->job_title=$customer->job_title;
        $this->company_name=$customer->company_name;
        $this->working_period=$customer->working_period;
        $this->side_job=$customer->side_job;
        $this->marital_status_id=$customer->marital_status_id;
    }

    public function update()
    {
        $this->validate([
            'cif'=>'required|unique:customers',
            'name'=>'required',
            'address'=>'required',
            'kota_kab_code'=>'required',
            'kecamatan'=>'required',
            'desa'=>'required',
            'postal_code'=>'required',
            'identity_id'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
            'mother_name'=>'required',
            'job_type_id'=>'required',
            'marital_status_id'=>'required',
        ]);

        $customer = Customer::find($this->customerId)->update([
            'cif'=>$this->cif,
            'name'=>$this->name,
            'address'=>$this->address,
            'kota_kab_code'=>$this->kota_kab_code,
            'kecamatan'=>$this->kecamatan,
            'desa'=>$this->desa,
            'postal_code'=>$this->postal_code,
            'identity_id'=>$this->identity_id,
            'family_card_id'=>$this->family_card_id,
            'married_certificate_id'=>$this->married_certificate_id,
            'tax_identification_number'=>$this->tax_identification_number,
            'birth_place'=>$this->birth_place,
            'birth_date'=>$this->birth_date,
            'mother_name'=>$this->mother_name,
            'work_address'=>$this->work_address,
            'job_type_id'=>$this->job_type_id,
            'job_description'=>$this->job_description,
            'job_title'=>$this->job_title,
            'company_name'=>$this->company_name,
            'working_period'=>$this->working_period,
            'side_job'=>$this->side_job,
            'marital_status_id'=>$this->marital_status_id,
        ]);

        if($customer){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data nasabah',
                'type'=>'success'
            ]);
            return redirect()->route('data.nasabah');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data nasabah',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        $this->kotaKabs = KotaKab::all();
        $this->jobTypes = JobType::all();
        $this->maritalStatuses = MaritalStatus::all();
        return view('livewire.app.data.customer.detail')->extends('layouts.master');
    }
}
