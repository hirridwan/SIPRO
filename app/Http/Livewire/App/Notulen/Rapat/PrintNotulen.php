<?php

namespace App\Http\Livewire\App\Notulen\Rapat;

use Livewire\Component;

class PrintNotulen extends Component
{
    public function render()
    {
        return view('livewire.app.notulen.rapat.print-notulen')->extends('layouts.dokumen');
    }
}