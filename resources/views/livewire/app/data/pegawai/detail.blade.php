<div>
    @section('title','Data Pegawai')
    @section('section-header','Data Pegawai')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pegawai</h4>
                </div>

                <form wire:submit.prevent="update">
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
                                    <label for="office_code" class="form-label">Kantor</label>
                                    <select wire:model.defer="office_code" class="form-control @error('office_code') is-invalid @enderror">
                                        <option selected>-- Pilih Kantor --</option>
                                        @foreach($offices as $office)
                                        <option value={{$office->code}}>{{$office->code." - ".$office->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('office_code')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="unit_kerja_id" class="form-label">Unit Kerja</label>
                                    <select wire:model.defer="unit_kerja_id" class="form-control @error('unit_kerja_id') is-invalid @enderror">
                                        <option selected>-- Pilih Unit Kerja --</option>
                                        @foreach($unit_kerjas as $unit_kerja)
                                        <option value={{$unit_kerja->id}}>{{$unit_kerja->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_kerja_id')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan_id" class="form-label">Jabatan</label>
                                    <select wire:model.defer="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                                        <option selected>-- Pilih Jabatan --</option>
                                        @foreach($jabatans as $jabatan)
                                        <option value={{$jabatan->id}}>{{$jabatan->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('jabatan_id')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>      
                            <div class="col-lg-6">
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
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User</label>
                                    <select wire:ignore class="form-control select2 @error('user_id') is-invalid @enderror">
                                        <option selected>-- Pilih User --</option>
                                        @foreach($users as $user)
                                        <option value={{$user->id}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ttd" class="form-label">Tanda Tangan</label>
                                    <input wire:model.defer="ttd" type="text" class="form-control @error('ttd') is-invalid @enderror">
                                    @error("ttd")
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
            $('#user_id').change(function(e){
                var value = $(this).val();
                @this.user_id=value;
            });
        });
    </script>
    @endpush
</div>
