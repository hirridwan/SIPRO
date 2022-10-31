<div>
    @section('title','Data Jabatan')
    @section('section-header','Data Jabatan')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Data Jabatan</h4>
                </div>

                <form wire:submit.prevent="update">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Jabatan</label>
                                    <input wire:model.defer="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                                    @error("nama")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="singkatan" class="form-label">Singkatan</label>
                                    <input wire:model.defer="singkatan" type="text" class="form-control @error('singkatan') is-invalid @enderror">
                                    @error("singkatan")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level</label>
                                    <input wire:model.defer="level" type="text" class="form-control @error('level') is-invalid @enderror">
                                    @error("level")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="bagian_id" class="form-label">Bagian</label>
                                    <select wire:model.defer="bagian_id" class="form-control @error('bagian_id') is-invalid @enderror">
                                        <option selected>-- Pilih Bagian --</option>
                                        @foreach($bagians as $bagian)
                                        <option value={{$bagian->id}}>{{$bagian->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('bagian_id')
                                    {{$message}}
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
