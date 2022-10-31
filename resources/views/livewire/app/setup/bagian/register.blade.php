<div>
    @section('title','Register Bagian')
    @section('section-header','Register Bagian')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Register Bagian</h4>
                </div>

                <form wire:submit.prevent="store">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
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
                            <div class="col">
                                <div class="mb-3">
                                    <label for="singkatan" class="form-label">Singkatan</label>
                                    <input wire:model.defer="singkatan" type="text" class="form-control @error('singkatan') is-invalid @enderror">
                                    @error("singkatan")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>     
                            <div class="col">
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level</label>
                                    <input wire:model.defer="level" type="text" class="form-control @error('level') is-invalid @enderror">
                                    @error("level")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>     
                            <div class="col">
                                <div class="mb-3">
                                    <label for="bagian" class="form-label">Bagian</label>
                                    <input wire:model.defer="bagian" type="text" class="form-control @error('bagian') is-invalid @enderror">
                                    @error("bagian")
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
</div>