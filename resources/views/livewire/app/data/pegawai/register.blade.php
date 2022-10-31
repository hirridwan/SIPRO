<div>
    @section('title','Register Pegawai')
    @section('section-header','Register Pegawai')
    @push('page_specific_css')
        <style type="text/css">
            .image-preview{
                height: 200px;
                width: 150px;
            }
        </style>
    @endpush
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Register Pegawai</h4>
                </div>

                <form wire:submit.prevent="store">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pegawai</label>
                                    <input wire:model.defer="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                                    @error("nama")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="office_code">Kantor</label>
                                    <select wire:model.lazy="office_code" id="office_code" class="form-control @error('office_code') is-invalid @enderror" >
                                    <option selected>--Pilih Kantor--</option>
                                    @foreach($offices as $key=>$office)
                                        <option value={{$office->code}}>{{$office->name}}</option>
                                    @endforeach
                                    </select> 
                                    @error('office_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="unit_kerja_id" class="form-label">Unit Kerja</label>
                                    <select wire:model.lazy="unit_kerja_id" id="unit_kerja_id" class="form-control @error('unit_kerja_id') is-invalid @enderror" >
                                    <option selected>--Pilih Unit Kerja--</option>
                                    @foreach($unit_kerjas as $key=>$unit_kerja)
                                        <option value={{$unit_kerja->id}}>{{$unit_kerja->nama}}</option>
                                    @endforeach
                                    </select> 
                                    @error('unit_kerja_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan_id" class="form-label">Jabatan</label>
                                    <select wire:model.lazy="jabatan_id" id="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror" >
                                    <option selected>--Pilih Jabatan--</option>
                                    @foreach($jabatans as $key=>$jabatan)
                                        <option value={{$jabatan->id}}>{{$jabatan->nama}}</option>
                                    @endforeach
                                    </select> 
                                    @error('jabatan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>      
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="bagian_id" class="form-label">Bagian</label>
                                    <select wire:model.lazy="bagian_id" id="bagian_id" class="form-control @error('bagian_id') is-invalid @enderror" >
                                    <option selected>--Pilih Bagian--</option>
                                    @foreach($bagians as $key=>$bagian)
                                        <option value={{$bagian->id}}>{{$bagian->nama}}</option>
                                    @endforeach
                                    </select> 
                                    @error('bagian_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>                                
                                <div class="mb-3" wire:ignore>
                                    <label for="user_id" class="form-label">User</label>
                                    <select id="user_id" class="form-control select2 @error('user_id') is-invalid @enderror" >
                                        <option selected>--Pilih User--</option>
                                        @foreach($users as $key=>$user)
                                            <option value={{$user->id}}>{{$user->name}}</option>
                                        @endforeach
                                    </select> 
                                    @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ttd" class="form-label">Tanda Tangan</label>
                                    <input wire:model="ttd" type="file" class="form-control @error('ttd') is-invalid @enderror">
                                    @error("ttd")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <div class="spinner-border" role="status" wire:loading
                                        wire:target="ttd">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div>
                                    @if($encodedTtd)
                                    <img height="100" class="img-fluid mt-1" src="{{$encodedTtd}}" alt="{{$encodedTtd}}"/>
                                    <div class="media-links mb-0">
                                        <a class="card-link text-danger" href="#" wire:click.prevent="clearUploadTtd">
                                            <i class="fas fa-trash"></i><span>Hapus</span>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3 mt-2">
                                    <label for="foto" class="form-label">Foto Pegawai</label>
                                    <input wire:model="foto" type="file" class="form-control @error('foto') is-invalid @enderror">
                                    @error("foto")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <div class="spinner-border" role="status" wire:loading
                                        wire:target="foto">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div>
                                    @if($encodedFoto)
                                    <img class="img-fluid mt-1 image-preview" src="{{$encodedFoto}}" alt="{{$encodedFoto}}"/>
                                    <div class="media-links mb-0">
                                        <a class="card-link text-danger" href="#" wire:click.prevent="clearUploadFoto">
                                            <i class="fas fa-trash"></i><span>Hapus</span>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>      
                        </div>
                        <div class="buttons float-right mb-3">
                            <button onclick="history.back()" class="btn btn-danger">Batal</button>
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
            $('#user_id').change(function(e){
                var value = $(this).val();
                @this.user_id=value;
            });
        });
    </script>
    @endpush
</div>