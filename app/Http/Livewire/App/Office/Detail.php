<?php

namespace App\Http\Livewire\App\Office;

use Livewire\Component;
use App\Models\Office;


class Detail extends Component
{
    public $officeId,$code,$name,$shortname,$address,$order;

    public function mount($id)
    {
        $office = Office::find($id);
        $this->officeId=$office->id;
        $this->code=$office->code;
        $this->name=$office->name;
        $this->shortname=$office->shortname;
        $this->address=$office->address;
        $this->order=$office->order;
    }

    public function update()
    {
        $this->validate([
            'code'=>'required',
            'name'=>'required',
            'shortname'=>'required',
            'address'=>'required',
        ]);

        $office = Office::find($this->officeId)->update([
            'code'=>$this->code,
            'name'=>$this->name,
            'shortname'=>$this->shortname,
            'address'=>$this->address,
            'order'=>$this->order,
        ]);

        if($office){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data kantor',
                'type'=>'success'
            ]);
            return redirect()->route('setup.offices');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data user',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }
   
    public function render()
    {
        return view('livewire.app.office.detail')->extends('layouts.master');
    }
}
