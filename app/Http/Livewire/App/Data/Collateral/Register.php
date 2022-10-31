<?php

namespace App\Http\Livewire\App\Data\Collateral;

use App\Models\Loan;
use Livewire\Component;
use App\Models\Collateral;
use App\Repositories\Helper;
use App\Models\CollateralType;
use App\Models\InsuranceStatus;
use Symfony\Component\Console\Input\Input;



class Register extends Component
{

    protected $listeners = ['inputDataKredit'];
    
    public $loan_id;
    public $agunan_id;
    public $collateral_type_code;
    public $peringkat_surat_berharga;
    public $pemeringkat;
    public $jenis_pengikatan;
    public $bukti_kepemilikan;
    public $keterangan_agunan;
    public $nama_pemilik;
    public $alamat_agunan;
    public $lokasi_agunan;
    public $nilai_jaminan;
    public $nilai_pasar;
    public $nilai_taksasi;
    public $nilai_apraisal;
    public $insurance_status_code;

    public function inputDataKredit()
    {
        return redirect()->route('data.kredit.register');
    }

    public $loanData=Array([
        'id',
        'loan_id',
        'cif',
        'plafon'
    ]);

    public function getLoanId()
    {
        $loanData = Loan::where('loan_id',$this->loan_id)->get()->toArray();
        if(!empty($loanData))
        {
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Data Kredit Ditemukan!',
                'text'=>$loanData[0]['cif']." - ".$loanData[0]['plafon'],
                'type'=>'success',
            ]);
            $this->loan_id=$loanData[0]['loan_id'];
            $this->loanData['id']=$loanData[0]['id'];
            $this->loanData['cif']=$loanData[0]['cif'];
            $this->loanData['plafon']=$loanData[0]['plafon'];
        }else{
            $this->dispatchBrowserEvent('swal:redirect-page',[
                'title'=>'Data Kredit Tidak Ditemukan!',
                'text'=>'Input Data Kredit Sekarang?',
                'type'=>'error',
                'routeDestination'=>'inputDataKredit'
            ]);
            $this->loan_id='';
            $this->loanData['id']='';
            $this->loanData['cif']='';
            $this->loanData['plafon']='';
        }
    }

    public function store()
    {
        
        $this->validate([
            'agunan_id'=>'required',
            'collateral_type_code'=>'required',
            'peringkat_surat_berharga'=>'required',
            'pemeringkat'=>'required',
            'jenis_pengikatan'=>'required',
            'bukti_kepemilikan'=>'required',
            'keterangan_agunan'=>'required',
            'nama_pemilik'=>'required',
            'alamat_agunan'=>'required',
            'lokasi_agunan'=>'required',
            'nilai_jaminan'=>'required',
            'nilai_pasar'=>'required',
            'nilai_taksasi'=>'required',
            'nilai_apraisal'=>'required',
            'insurance_status_code'=>'required',
        ]);
        
        // dd($this->nilai_pasar);
        $collateral = Collateral::create([
            'agunan_id'=>$this->agunan_id,
            'collateral_type_code'=>$this->collateral_type_code,
            'peringkat_surat_berharga'=>$this->peringkat_surat_berharga,
            'pemeringkat'=>$this->pemeringkat,
            'jenis_pengikatan'=>$this->jenis_pengikatan,
            'bukti_kepemilikan'=>$this->bukti_kepemilikan,
            'keterangan_agunan'=>$this->keterangan_agunan,
            'nama_pemilik'=>$this->nama_pemilik,
            'alamat_agunan'=>$this->alamat_agunan,
            'lokasi_agunan'=>$this->lokasi_agunan,
            'nilai_jaminan'=>$this->nilai_jaminan,
            'nilai_pasar'=>$this->nilai_pasar,
            'nilai_taksasi'=>$this->nilai_taksasi,
            'nilai_apraisal'=>$this->nilai_apraisal,
            'insurance_status_code'=>$this->insurance_status_code,
            'loan_id'=>$this->loan_id,
        ]);

        // dd($collateral);
        
        if($collateral){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data agunan',
                'type'=>'success'
            ]);
            return redirect()->route('data.agunan');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data agunan',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }
    
    public function render()
    {
        $this->insuranceStatuses = InsuranceStatus::all();
        $this->collateralTypes = CollateralType::all();
        return view('livewire.app.data.collateral.register')->extends('layouts.master');
    }
}
