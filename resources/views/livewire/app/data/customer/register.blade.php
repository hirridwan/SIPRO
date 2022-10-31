<div>
    @section('title','Register Nasabah')
    @section('section-header','Register Nasabah')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Formulir Register Nasabah</h4>
                </div>
                <form wire:submit.prevent="store">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="office_code" class="form-label">Pilih Kantor</label>
                                <select wire:model="office_code" class="form-control @error('office_code') is-invalid @enderror" name="" id="">
                                    <option>-- Pilih Kantor --</option>
                                    @foreach($offices as $office)
                                        <option value="{{$office->code}}">{{$office->code." - ".$office->name}}</option>
                                    @endforeach
                                </select>
                                @error('office_code')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="cif" class="form-label">CIF</label>
                                    <input wire:model.defer="cif" type="text" class="form-control @error('cif') is-invalid @enderror">
                                    @error("cif")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input wire:model.defer="name" type="text" class="form-control @error('name') is-invalid @enderror">
                                    @error("name")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input wire:model.defer="address" type="text" class="form-control @error('address') is-invalid @enderror">
                                    @error("address")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="identity_id" class="form-label">Nomor KTP</label>
                                    <input wire:model.defer="identity_id" type="text" class="form-control @error('identity_id') is-invalid @enderror">
                                    @error("identity_id")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <div wire:ignore>
                                    <label for="kotaKab" class="form-label">Kota / Kabupaten</label>
                                    <select class="form-control select2 @error('kota_kab_code') is-invalid @enderror" id="kotaKab">
                                        <option value="">-- Pilih Kota/Kab. --</option>
                                        @foreach($kotaKabs as $kotaKab)
                                            <option value="{{$kotaKab->id}}">{{$kotaKab->code." - ".$kotaKab->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("kota_kab_code")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="postal_code" class="form-label">Kode Pos</label>
                                    <input wire:model.defer="postal_code" class="form-control @error('postal_code') is-invalid @enderror"  type="text" id="postal_code">
                                    @error("postal_code")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror   
                                </div>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="desa" class="form-label">Desa</label>
                                    <input wire:model.defer="desa" class="form-control @error('desa') is-invalid @enderror"  type="text"id="desa">
                                    @error("desa")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input wire:model.defer="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror"  type="text" id="kecamatan">
                                    @error("kecamatan")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <div wire:ignore>
                                        <label for="statusPernikahan" class="form-label">Status Pernikahan</label>
                                        <select class="form-control select2 @error('marital_status_id') is-invalid @enderror" id="statusPernikahan">
                                            <option selected>-- Pilih Status Pernikahan--</option>
                                            @foreach($maritalStatuses as $maritalStatus)
                                                <option value="{{$maritalStatus->id}}">{{$maritalStatus->code." - ".$maritalStatus->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("marital_status_id")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="family_card_id" class="form-label">Nomor KK</label>
                                    <input wire:model.defer="family_card_id" type="text" class="form-control @error('family_card_id') is-invalid @enderror">
                                    @error("family_card_id")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="tax_identification_number" class="form-label">Nomor NPWP</label>
                                    <input wire:model.defer="tax_identification_number" type="text" class="form-control @error('tax_identification_number') is-invalid @enderror">
                                    @error("tax_identification_number")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="married_certificate_id" class="form-label">Nomor Buku Nikah</label>
                                    <input wire:model.defer="married_certificate_id" type="text" class="form-control @error('married_certificate_id') is-invalid @enderror">
                                    @error("married_certificate_id")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="birth_place" class="form-label">Tempat Lahir</label>
                                    <input wire:model.defer="birth_place" type="text" class="form-control @error('birth_place') is-invalid @enderror">
                                    @error("birth_place")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                    <input wire:model.defer="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror">
                                    @error("birth_date")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> 
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="mother_name" class="form-label">Nama Ibu Kandung</label>
                                    <input wire:model.defer="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror">
                                    @error("mother_name")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <div wire:ignore>
                                        <label for="jenisPekerjaan" class="form-label">Jenis Pekerjaan</label>
                                        <select wire:model.defer="job_type_id" class="form-control select2 @error('job_type_id') is-invalid @enderror">
                                            <option selected>-- Pilih Jenis Pekerjaan --</option>
                                            @foreach($jobTypes as $jobType)
                                                <option value="{{$jobType->id}}">{{$jobType->code." - ".$jobType->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("job_type_id")
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="job_description" class="form-label">Keterangan Pekerjaan</label>
                                    <input wire:model.defer="job_description" type="text" class="form-control @error('job_description') is-invalid @enderror">
                                    @error("job_description")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="job_title" class="form-label">Jabatan Pekerjaan</label>
                                    <input wire:model.defer="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror">
                                    @error("job_title")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Nama Perusahaan</label>
                                    <input wire:model.defer="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror">
                                    @error("company_name")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="work_address" class="form-label">Alamat Tempat Bekerja</label>
                                    <input wire:model.defer="work_address" type="text" class="form-control @error('work_address') is-invalid @enderror">
                                    @error("work_address")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="side_job" class="form-label">Pekerjaan Lain</label>
                                    <input wire:model.defer="side_job" type="text" class="form-control @error('side_job') is-invalid @enderror">
                                    @error("side_job")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="working_period" class="form-label">Lama Bekerja</label>
                                    <input wire:model.defer="working_period" type="text" class="form-control @error('working_period') is-invalid @enderror">
                                    @error("working_period")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="buttons float-right mb-3">
                            <button type="submit" class="btn btn-primary" style="width: 8rem;">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('page_specific_js')    
    <script>
        $(document).ready(function(){
            $('#kotaKab').change(function(e){
                var value = $(this).val();
                @this.kota_kab_code=value;
            });
            $('#statusPernikahan').change(function(e){
                var value = $(this).val();
                @this.marital_status_id=value;
            });
            $('#jenisPekerjaan').change(function(e){
                var value = $(this).val();
                @this.job_type_id=value;
            });
        });
    </script>
    @endpush
</div>
