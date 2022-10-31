<?php

namespace App\Http\Livewire\App\Notulen\Rapat;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Repositories\Helper;
use App\Models\User;
use App\Models\Rapat;
use App\Models\PesertaRapat;
use App\Models\Pendapat;
use App\Models\Pegawai;
use App\Models\Office;
use Auth;


class Register extends Component
{
    public Rapat $rapat;
    public $newRapat;
    public $newPesertaRapat;
    public $newNotulis;
    public $offices;
    public $userId;

    public function rules()
    {
     
    }

    public function mount()
    {
        $this->userId=Auth::user()->id;
    }

    public function storeRapat()
    {
        $this->validate([
            'newRapat.tanggal'=>['required'],
            'newRapat.jam'=>['required'],
            'newRapat.tempat'=>['required'],
            'newNotulis'=>['required'],
        ]);
        $helper = new Helper;
        $lastNumber = DB::table('last_no_registrasi_rapat')->select('last_number')->get();
        // dd($lastNumber);
        if(empty($lastNumber))
        {
            $number = 0;
            $noRegistrasi = $helper->createNoRegistrasiRapat(0,$this->newRapat["tanggal"]);
        }else{
            $number = $lastNumber[0]->last_number;
            // dd($number);
            $noRegistrasi = $helper->createNoRegistrasiRapat($number,$this->newRapat["tanggal"]);
        }
        $linkNotulen = config('app.url').':8000'.'/dokumen/verifikasi/notulen/info/'.$noRegistrasi;
        $rapat = Rapat::updateOrCreate(
            ['no_registrasi'=>$noRegistrasi],
            [
                'hari'=>'hari',
                'tanggal'=>$this->newRapat["tanggal"],
                'jam'=>$this->newRapat["jam"],
                'tempat'=>$this->newRapat['tempat'],
                'pimpinan'=>$this->newRapat['pimpinan'],
                'pembahasan'=>$this->newRapat['pembahasan'],
                'office_code'=>$this->newRapat['office_code'],
                'notulis_id'=>$this->newNotulis,
                'link_notulen'=>$linkNotulen,
            ]
        );
        if($rapat)
        {
            $rapatId = $rapat->id;
            
            foreach($this->newPesertaRapat as $peserta)
            {
                PesertaRapat::firstOrCreate(
                    ['pegawai_id'=>$peserta,'rapat_id'=>$rapatId],[]
                );
            }
            $number==0?DB::table('last_no_registrasi_rapat')->insert(['last_number'=>$number+1]):DB::table('last_no_registrasi_rapat')->update(['last_number'=>$number+1]);
            
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil tambah data rapat',
                'type'=>'success'
            ]);
            return redirect()->route('notulen.rapat');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal tambah data rapat',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {

        if(Auth::user()->role->id==1)
        {
            $this->offices = Office::all();            
        }else{
            $this->offices = Office::where('code','!=','00')->where('id',Auth::user()->office->id)->get();
        }

        $pegawai = Pegawai::all();
        return view('livewire.app.notulen.rapat.register',[
            'pegawai'=>$pegawai,
        ])->extends('layouts.master');
    }
}
