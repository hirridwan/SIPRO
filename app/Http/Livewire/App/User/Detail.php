<?php

namespace App\Http\Livewire\App\User;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Role;
use App\Models\Office;

class Detail extends Component
{
    public $userid,$name,$fullname,$email,$phone,$role_id,$office_id;
    public $offices,$roles;

    public function mount($id)
    {
        $user = User::find($id);
        $this->userid=$id;
        $this->name = $user->name;
        $this->fullname = $user->fullname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role_id = $user->role_id;
        $this->office_id = $user->office_id;

        $this->offices=Office::all();
        $this->roles=Role::all();
    }

    public function update()
    {
        $this->validate([
            'name'=>['required', 'string','min:6', 'max:16', Rule::unique('users')->ignore($this->userid), 'alpha_dash'],
            'fullname'=>['required','max:150'],
            'email'=>['required','email',Rule::unique('users')->ignore($this->userid)],
            'phone'=>'required',
            'office_id'=>'required',
            'role_id'=>'required'
        ]);

        $user = User::find($this->userid);
        $updated = $user->update([
            'name'=>$this->name,
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'office_id'=>$this->office_id,
            'role_id'=>$this->role_id
        ]);
        if($updated){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil simpan data user',
                'type'=>'success'
            ]);
            return redirect()->route('users');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal simpan data user',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.app.user.detail')->extends('layouts.master');
    }
}
