<div>
  @section('title','Register Kantor')
  @section('section-header','Register Kantor')
  <div class="card">
    <div class="card-header">
      <h4>Registrasi Kantor</h4>
    </div>
    <form wire:submit.prevent="store">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group ">
              <label for="code">Masukkan Kode Kantor</label>
              <input wire:model.lazy="code" type="number" class="form-control @error('code') is-invalid @enderror" placeholder="Masukkan Kode Kantor" required>              
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
              <input wire:model.lazy="shortname" type="text" class="form-control @error('shortname') is-invalid @enderror" placeholder="Masukkan Alias Kantor" required>             
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
              <label for="order">Order Kantor</label>
              <input wire:model.lazy="order" type="number" class="form-control @error('order') is-invalid @enderror" placeholder="Masukkan Order Kantor">             
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