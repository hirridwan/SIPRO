<?php

namespace App\Http\Livewire\App\Data\FinancialAnalysis;

use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        return view('livewire.app.data.financial-analysis.detail')->extends('layouts.master');
    }
}
