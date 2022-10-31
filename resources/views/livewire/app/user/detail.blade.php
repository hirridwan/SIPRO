
<div>
    @section('title','Detail User')
    @section('section-header','Detail User')
    <div class="card">
      <div class="card-header">
        <h4>Detail User</h4>
      </div>
      <form wire:submit.prevent="update">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group ">
                <label for="name">Username</label>
                <input wire:model.lazy="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Username" required>              
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group ">
                <label for="fullname">Nama Lengkap</label>
                <input wire:model.defer="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" required>             
                @error('fullname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input wire:model.lazy="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" required>             
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="phone">Nomor Handphone</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fab fa-whatsapp"></i>
                  </div>
                  </div>
                  <input wire:model.lazy="phone" type=text class="form-control phone-number @error('phone') is-invalid @enderror" placeholder="Masukkan Nomor Handphone" required>
                </div>
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="office_id">Kantor</label>
                <select wire:model.lazy="office_id" id="pilih_kantor" class="form-control @error('office_id') is-invalid @enderror" >
                <option selected>- Pilih Kantor -</option>
                @foreach($offices as $key=>$office)
                  @if($office->id==$office_id)
                  <option value={{$office->id}} selected>{{$office->name}}</option>
                  @else
                  <option value={{$office->id}}>{{$office->name}}</option>
                  @endif
                @endforeach
              </select>             
              @error('office_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
              </div>
              <div class="form-group">
                <label for="role_id">Role User</label>
                <select wire:model.lazy="role_id" class="form-control @error('role_id') is-invalid @enderror" >
                  <option selected>- Pilih Role User -</option>
                  @foreach($roles as $role)
                    @if($role->id==$role_id)
                    <option value={{$role->id}} selected>{{$role->description}}</option>
                    @else
                    <option value={{$role->id}}>{{$role->description}}</option>
                    @endif
                  @endforeach
                </select>             
                @error('role_id')
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