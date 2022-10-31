<div>
  @section('title','Register Role')
  @section('section-header','Register Role')
  <div class="card">
    <div class="card-header">
      <h4>Registrasi Role</h4>
    </div>
    <form wire:submit.prevent="store">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group ">
              <label for="description">Deskripsi Role</label>
              <input wire:model.lazy="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi Role" required>              
              @error('description')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group ">
              <label for="shortname">Alias Role</label>
              <input wire:model.defer="shortname" type="text" class="form-control @error('shortname') is-invalid @enderror" placeholder="Masukkan Alias Role" required>             
              @error('shortname')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="authorityLevel">Level Autoritas</label>
              <input wire:model.lazy="authorityLevel" type="number" class="form-control @error('authorityLevel') is-invalid @enderror" placeholder="Masukkan Urutan Kantor" required>             
              @error('authorityLevel')
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