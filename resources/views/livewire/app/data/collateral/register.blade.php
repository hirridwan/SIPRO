<div>
    @section('title','Register Agunan')
    @section('section-header','Register Agunan')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>FORM TAMBAH AGUNAN</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="loan_id" class="form-label">Masukkan ID Kredit</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mx-0">
                                            <input wire:model="loan_id" type="text" class="form-control @error('loan_id') is-invalid @enderror" placeholder="Masukan ID Kredit">
                                            <input type="hidden" wire:model="loan_id">
                                            @error('loan_id')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 align-self-center">
                                        <button wire:click.prevent="getLoanId" class="btn btn-primary">Cek Kredit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="loanData.cif" class="form-label">CIF</label>
                                    <input wire:model.defer="loanData.cif" type="text" class="form-control @error('loanData.cif') is-invalid @enderror" id="loanData.cif" disabled>
                                    @error("loanData.cif")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>  
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label for="loanData.plafon" class="form-label">Plafon</label>
                                    <input wire:model.defer="loanData.plafon" type="text" class="form-control @error('loanData.plafon') is-invalid @enderror" id="loanData.plafon" disabled>
                                    @error("loanData.plafon")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- kolom kiri -->
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="agunan_id" class="form-label">ID Agunan</label>
                                        <input wire:model.defer="agunan_id" type="text" class="form-control @error('agunan_id') is-invalid @enderror">
                                        @error("agunan_id")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="collateral_types" class="form-label">Jenis Agunan</label>
                                        <select wire:model="collateral_type_code" class="form-control @error('collateral_type_code') is-invalid @enderror" id="collateral_type_code">
                                            <option selected>-- Pilih Jenis Agunan --</option>
                                            @foreach($collateralTypes as $collateralType)
                                                <option value="{{$collateralType->code}}">{{ $collateralType->code." - ".$collateralType->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("collateral_type_code")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="peringkat_surat_berharga" class="form-label">Peringkat Surat Berharga</label>
                                        <input wire:model.defer="peringkat_surat_berharga" type="text" class="form-control @error('peringkat_surat_berharga') is-invalid @enderror">
                                        @error("peringkat_surat_berharga")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="pemeringkat" class="form-label">Pemeringkat</label>
                                        <input wire:model.defer="pemeringkat" type="text" class="form-control @error('pemeringkat') is-invalid @enderror">
                                        @error("pemeringkat")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="jenis_pengikatan" class="form-label">Jenis Pengikatan</label>
                                        <input wire:model.defer="jenis_pengikatan" type="text" class="form-control @error('jenis_pengikatan') is-invalid @enderror">
                                        @error("jenis_pengikatan")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="bukti_kepemilikan" class="form-label">Bukti Kepemilikan</label>
                                        <input wire:model.defer="bukti_kepemilikan" type="text" class="form-control @error('bukti_kepemilikan') is-invalid @enderror">
                                        @error("bukti_kepemilikan")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="keterangan_agunan" class="form-label">Keterangan Agunan</label>
                                        <input wire:model.defer="keterangan_agunan" type="text" class="form-control @error('keterangan_agunan') is-invalid @enderror">
                                        @error("keterangan_agunan")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- kolom kanan -->
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                        <input wire:model.defer="nama_pemilik" type="text" class="form-control @error('nama_pemilik') is-invalid @enderror">
                                        @error("nama_pemilik")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="alamat_agunan" class="form-label">Alamat Agunan</label>
                                        <input wire:model.defer="alamat_agunan" type="text" class="form-control @error('alamat_agunan') is-invalid @enderror">
                                        @error("alamat_agunan")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="lokasi_agunan" class="form-label">Lokasi Agunan</label>
                                        <input wire:model.defer="lokasi_agunan" type="text" class="form-control @error('lokasi_agunan') is-invalid @enderror">
                                        @error("lokasi_agunan")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="nilai_jaminan" class="form-label">Nilai Jaminan</label>
                                        <input wire:model.defer="nilai_jaminan" type="text" class="form-control @error('nilai_jaminan') is-invalid @enderror">
                                        @error("nilai_jaminan")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="nilai_pasar" class="form-label">Nilai Wajar / Pasar</label>
                                        <input wire:model.defer="nilai_pasar" type="text" class="form-control @error('nilai_pasar') is-invalid @enderror">
                                        @error("nilai_pasar")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="nilai_taksasi" class="form-label">Nilai Taksasi ( Internal )</label>
                                        <input wire:model.defer="nilai_taksasi" type="text" class="form-control @error('nilai_taksasi') is-invalid @enderror">
                                        @error("nilai_taksasi")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="nilai_apraisal" class="form-label">Nilai Appraisal Independen</label>
                                        <input wire:model.defer="nilai_apraisal" type="text" class="form-control @error('nilai_apraisal') is-invalid @enderror">
                                        @error("nilai_apraisal")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="insurance_statuses" class="form-label">Diasuransikan</label>
                                        <select wire:model="insurance_status_code" class="form-control @error('insurance_status_code') is-invalid @enderror" id="insurance_status_code">
                                            <option value="01" selected>Ya</option>    
                                            <option value="02">Tidak</option>
                                        </select>
                                        @error("insurance_status_code")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="buttons float-right">
                                    <input type="submit" class="btn btn-primary" name="" id="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('page_specific_js')
    <script>
        let nilai_pasar = document.getElementById('nilai_pasar');

        nilai_pasar.addEventListener('keyup',function(){
            nilai_pasar = rupiahFormat(this.value);
        });

    </script>
    <script>
        $(document).ready(function(){
            $('#officeId').change(function(e){
                var value = $(this).val();
                @this.officeId=value;
            });
        }); 
    </script>
    @endpush
</div>
