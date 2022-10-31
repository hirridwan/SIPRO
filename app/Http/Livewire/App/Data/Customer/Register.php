<?php

namespace App\Http\Livewire\App\Data\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\JobType;
use App\Models\KotaKab;
use App\Models\MaritalStatus;
use App\Models\Office;
use Auth;


class Register extends Component
{
    public $office_code;
    public $offices;
    public $cif;
    public $name;
    public $address;
    public $kota_kab_code;
    public $kecamatan;
    public $desa;
    public $postal_code;
    public $identity_id;
    public $family_card_id;
    public $married_certificate_id;
    public $tax_identification_number;
    public $birth_place;
    public $birth_date;
    public $mother_name;
    public $work_address;
    public $job_type_id;
    public $job_description;
    public $job_title;
    public $company_name;
    public $working_period;
    public $side_job;
    public $marital_status_id;

    public function store()
    {
        $this->validate([
            'office_code'=>'required',
            'cif'=>'required',
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
            'marital_status_id'=>'required'
        ]);
        $customer = Customer::create([
            'office_code'=>$this->office_code,
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
            'marital_status_id'=>$this->marital_status_id
        ]);

        if($customer){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data nasabah',
                'type'=>'success'
            ]);
            return redirect()->route('data.nasabah');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data nasabah',
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

        if(Auth::user()->role->id==1)
        {
            $this->offices = Office::where('code','!=','00')->get();            
        }else{
            $this->offices = Office::where('code','!=','00')->where('id',Auth::user()->office->id)->get();
        }
        return view('livewire.app.data.customer.register')->extends('layouts.master');
    }
}