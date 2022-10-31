<?php

namespace App\Http\Livewire\App\Notulen\Rapat;

use Livewire\Component;
use App\Repositories\Helper;
use App\Models\Rapat;
use App\Models\Pendapat;
use QrCode;

class Detail extends Component
{
    public $rapat;

    public function mount($id)
    {
        $this->rapat = Rapat::find($id);
    }

    public function render()
    {
       $helper = new Helper;
        $logo = $helper->toBase64("img/img/logo-png.png");
        $ttd = $helper->toBase64("img/img/ttd.png");

        $helper = new Helper;
        $waktu_rapat = $helper->getWaktuRapat($this->rapat->tanggal);
        $pendapat = Pendapat::all();
        return view('livewire.app.notulen.rapat.print-notulen',[
            'pendapat'=>$pendapat,
            'waktu_rapat'=>$waktu_rapat,
            'logo'=>$logo,
            'ttd'=>$ttd,
        ])->extends('layouts.dokumen');
    }
}
