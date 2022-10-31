<?php

namespace App\Http\Livewire\App\Notulen\Rapat;

use Livewire\Component;
use App\Models\Rapat;
use App\Repositories\Helper;
use PDF;

class Index extends Component
{
    public $peserta;

    public function showModalPeserta($id)
    {
        $this->dispatchBrowserEvent('show-modal-peserta');
        $rapat = Rapat::find($id);
        $this->peserta=$rapat->peserta;
    }

    public function printNotulen($rapatId)
    {
        $rapat = Rapat::find($rapatId);
        $noRegistrasi = $rapat->no_registrasi;
        $helper = new Helper;
        $random = $helper->getRandomString(10);
        $filename= $noRegistrasi."-".$random.".pdf";
        $waktu_rapat = $helper->getWaktuRapat($rapat->tanggal);
        // $filename= $helper->getRandomString(10).".pdf";
        $logo = $helper->toBase64("img/img/logo-png.png");
        $ttd = $helper->toBase64("img/img/ttd.png");

        $pdf = PDF::loadView('livewire.app.notulen.rapat.print-notulen',[
            'rapat'=>$rapat,
            'waktu_rapat'=>$waktu_rapat,
            'logo'=>$logo,
            'ttd'=>$ttd,
            ])->output();
        return response()->streamDownload(
            fn()=>print($pdf),
            $filename
        );
    }

    public function render()
    {
        $rapat = Rapat::all();
        return view('livewire.app.notulen.rapat.index',[
            'rapat'=>$rapat,
        ])->extends('layouts.master');
    }
}   
