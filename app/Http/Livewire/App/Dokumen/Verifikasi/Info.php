<?php

namespace App\Http\Livewire\App\Dokumen\Verifikasi;

use Livewire\Component;
use App\Models\Rapat;
use App\Repositories\Helper;

class Info extends Component
{
    public $no_registrasi;
    public $kode_dokumen;

    public function mount($id)
    {
        $helper = new Helper;
        $this->no_registrasi=$id;
        $this->kode_dokumen = $helper->getDocumentCode($id);
        if($this->kode_dokumen=='NTLN')
        {
            return redirect()->route('notulen.rapat.info',['id'=>$this->no_registrasi]);
        }
    }

    public function render()
    {
        return view('livewire.app.dokumen.verifikasi.info')->extends('layouts.default');
    }
}