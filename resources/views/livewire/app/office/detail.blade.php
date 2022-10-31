
<div>
    @section('title','Detail Kantor')
    @section('section-header','Detail Kantor')
    <div class="card">
      <div class="card-header">
        <h4>Detail Kantor</h4>
      </div>
      <form wire:submit.prevent="update">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group ">
                <label for="code">Kode Kantor</label>
                <input wire:model.lazy="code" type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Masukkan Kode Kantor" required>              
                @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group ">
                <label for="name">Nama Kantor</label>
                <input wire:model.defer="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Kantor" required>             
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="shortname">Alias Kantor</label>
                <input wire:model.lazy="shortname" type="text" class="form-control @error('shortname') is-invalid @enderror" placeholder="Masukkan Alias (Contoh: BTKL untuk Kantor Cabang Bantarkalong)" required>             
                @error('shortname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="address">Alamat Kantor</label>
                <input wire:model.lazy="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Masukkan Alamat Kantor" required>             
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="order">No Urut Kantor</label>
                <input wire:model.lazy="order" type="number" class="form-control @error('order') is-invalid @enderror" placeholder="Masukkan Order Kantor" required>             
                @error('order')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
          </div>
        </div>
  
        <div class="card-footer text-right">
          <button onclick="history.back()" class="btn btn-danger">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>