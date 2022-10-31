<div>
    @section('title','Data Bagian')
    @section('section-header','Data Bagian')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Data Bagian</h4>
                </div>

                <form wire:submit.prevent="update">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Bagian</label>
                                    <input wire:model.defer="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                                    @error("nama")
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
