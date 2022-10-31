<?php

namespace App\Http\Livewire\App\Data\Collateral;

use Livewire\Component;
use App\Models\Collateral;

class Detail extends Component
{
    public $agunan_id,
    $jenis_agunan,
    $peringkat_surat_berharga,
    $pemeringkat,
    $jenis_pengikatan,
    $bukti_kepemilikan,
    $keterangan_agunan,
    $nama_pemilik,
    $alamat_agunan,
    $lokasi_agunan,
    $nilai_jaminan,
    $nilai_pasar,
    $nilai_taksasi,
    $nilai_apraisal,
    $diasuransikan;

    public function mount($id)
    {
        $collateral = collateral::find($id);
        $this->collateralId=$collateral->id;
        $this->jenis_agunan=$collateral->jenis_agunan;
        $this->peringkat_surat_berharga=$collateral->peringkat_surat_berharga;
        $this->pemeringkat=$collateral->pemeringkat;
        $this->jenis_pengikatan=$collateral->jenis_pengikatan;
        $this->bukti_kepemilikan=$collateral->bukti_kepemilikan;
        $this->keterangan_agunan=$collateral->keterangan_agunan;
        $this->nama_pemilik=$collateral->nama_pemilik;
        $this->alamat_agunan=$collateral->alamat_agunan;
        $this->lokasi_agunan=$collateral->lokasi_agunan;
        $this->nilai_jaminan=$collateral->nilai_jaminan;
        $this->nilai_pasar=$collateral->nilai_pasar;
        $this->nilai_taksasi=$collateral->nilai_taksasi;
        $this->nilai_apraisal=$collateral->nilai_apraisal;
        $this->diasuransikan=$collateral->diasuransikan;
    }

    public function update()
    {
        $this->validate([
            'jenis_agunan'=>'required',
            'peringkat_surat_berharga'=>'required',
            'pemeringkat'=>'required',
            'jenis_pengikatan'=>'required',
            'bukti_kepemilikan'=>'required',
            'keterangan_agunan'=>'required',
            'nama_pemilik'=>'required',
            'alamat_agunan'=>'required',
            'lokasi_agunan'=>'required',
            'nilai_jaminan'=>'required',
            'nilai_pasar'=>'required',
            'nilai_taksasi'=>'required',
            'nilai_apraisal'=>'required',
            'diasuransikan'=>'required',
        ]);

        $collateral = Collateral::find($this->collateralId)->update([
            'jenis_agunan'=>$this->jenis_agunan,
            'peringkat_surat_berharga'=>$this->peringkat_surat_berharga,
            'pemeringkat'=>$this->pemeringkat,
            'jenis_pengikatan'=>$this->jenis_pengikatan,
            'bukti_kepemilikan'=>$this->bukti_kepemilikan,
            'keterangan_agunan'=>$this->keterangan_agunan,
            'nama_pemilik'=>$this->nama_pemilik,
            'alamat_agunan'=>$this->alamat_agunan,
            'lokasi_agunan'=>$this->lokasi_agunan,
            'nilai_jaminan'=>$this->nilai_jaminan,
            'nilai_pasar'=>$this->nilai_pasar,
            'nilai_taksasi'=>$this->nilai_taksasi,
            'nilai_apraisal'=>$this->nilai_apraisal,
            'diasuransikan'=>$this->diasuransikan,
        ]);

        if($collateral){
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Berhasil',
                'text'=>'Berhasil update data agunan',
                'type'=>'success'
            ]);
            return redirect()->route('data.agunan');
        }else{
            $this->dispatchBrowserEvent('swal:modal',[
                'title'=>'Gagal',
                'text'=>'Gagal update data agunan',
                'type'=>'error'
            ]);
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.app.data.collateral.index')->extends('layout.master');
    }
}
