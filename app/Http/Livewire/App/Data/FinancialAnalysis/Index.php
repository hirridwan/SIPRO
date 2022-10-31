<?php

namespace App\Http\Livewire\App\Data\FinancialAnalysis;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AdendumRequest;
use App\Models\Loan;
use Auth;

class Index extends Component
{
    use WithPagination;

    public $paginate = 20;
    public $paginationTheme='bootstrap';
    public $querySearch=null;
    
    protected $listeners = ['delete'];

    
    public function updatingQuerySearch()
    {
        $this->resetPage();
    }

    public function deleteConfirm($id,$reg_number)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete',[
            'title'=>'Hapus?',
            'type'=>'warning',
            'text'=>'Yakin akan menghapus data permohonan '.$reg_number. ' ?',
            'id'=>$id
        ]);
    }
    
    public function delete($id)
    {
        $adendumRequest = adendumRequest::find($id)->delete();

        if($adendumRequest){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil hapus data permohonan',
                'type'=>'success'
            ]);
            return redirect()->route('restruk');
        }else{            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal hapus data permohonan',
                'type'=>'error'
            ]);
            return redirect()->route('restruk');
        }
    }
    public function render()
    {
        if(Auth::user()->role->id==1)
        {
            if($this->querySearch===null){
                $adendumRequests = DB::table('adendum_requests')
                                        ->join('loans','adendum_requests.loan_id','=','loans.loan_id')
                                        ->join('customers','loans.cif','=','customers.cif')
                                        ->join('offices','loans.office_code','=','offices.code')
                                        ->join('adendum_statuses','adendum_requests.adendum_status_id','=','adendum_statuses.id')
                                        ->where('adendum_status_id',1)
                                        ->select(
                                            'adendum_requests.id',
                                            'adendum_requests.reg_number',
                                            'adendum_requests.loan_id',
                                            'customers.name as customer_name',
                                            'customers.address',
                                            'offices.shortname',
                                            'adendum_statuses.name as status_name'
                                        )->paginate($this->paginate);
            }else{
                $adendumRequests = DB::table('adendum_requests')
                                        ->join('loans','adendum_requests.loan_id','=','loans.loan_id')
                                        ->join('customers','loans.cif','=','customers.cif')
                                        ->join('offices','loans.office_code','=','offices.code')
                                        ->join('adendum_statuses','adendum_requests.adendum_status_id','=','adendum_statuses.id')
                                        ->where('adendum_status_id',1)
                                        ->where('customers.name','like','%'.$this->querySearch.'%')
                                        ->select(
                                            'adendum_requests.id',
                                            'adendum_requests.reg_number',
                                            'adendum_requests.loan_id',
                                            'customers.name as customer_name',
                                            'customers.address',
                                            'offices.shortname',
                                            'adendum_statuses.name as status_name'
                                        )->paginate($this->paginate);                
            }
        }else{
            if($this->querySearch===null){
                $adendumRequests = DB::table('adendum_requests')
                                        ->join('loans','adendum_requests.loan_id','=','loans.loan_id')
                                        ->join('customers','loans.cif','=','customers.cif')
                                        ->join('offices','loans.office_code','=','offices.code')
                                        ->join('adendum_statuses','adendum_requests.adendum_status_id','=','adendum_statuses.id')
                                        ->where('loans.office_code','=',Auth::user()->office_id)
                                        ->where('adendum_status_id',1)
                                        ->select(
                                            'adendum_requests.id',
                                            'adendum_requests.reg_number',
                                            'adendum_requests.loan_id',
                                            'customers.name as customer_name',
                                            'customers.address',
                                            'offices.shortname',
                                            'adendum_statuses.name as status_name'
                                        )->paginate($this->paginate);
            }else{
                $adendumRequests = DB::table('adendum_requests')
                                        ->join('loans','adendum_requests.loan_id','=','loans.loan_id')
                                        ->join('customers','loans.cif','=','customers.cif')
                                        ->join('offices','loans.office_code','=','offices.code')
                                        ->join('adendum_statuses','adendum_requests.adendum_status_id','=','adendum_statuses.id')
                                        ->where('loans.office_code','=',Auth::user()->office_id)
                                        ->where('adendum_status_id',1)
                                        ->where('customers.name','like','%'.$this->querySearch.'%')
                                        ->select(
                                            'adendum_requests.id',
                                            'adendum_requests.reg_number',
                                            'adendum_requests.loan_id',
                                            'customers.name as customer_name',
                                            'customers.address',
                                            'offices.shortname',
                                            'adendum_statuses.name as status_name'
                                        )->paginate($this->paginate);                
            }

        }
        return view('livewire.app.data.financial-analysis.index',[
            'adendumRequests'=>$adendumRequests,
        ])->extends('layouts.master');
    }
}
