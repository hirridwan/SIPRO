<?php

namespace App\Http\Livewire\App\Notulen\Rapat;

use Livewire\Component;
use App\Repositories\Helper;
use App\Models\Rapat;
use QrCode;

class Info extends Component
{
    public $no_registrasi;

    public function mount($id)
    {
        $this->no_registrasi=$id;
    }
    public function render()
    {
        $helper = new Helper;
        $rapat = Rapat::where('no_registrasi',$this->no_registrasi)->first();
        $waktu_rapat = $helper->getWaktuRapat($rapat->tanggal);
        return view('livewire.app.notulen.rapat.info',[
            'rapat'=>$rapat,
            'waktu_rapat'=>$waktu_rapat,
            'helper'=>$helper,
        ])->extends('layouts.default');
    }
}