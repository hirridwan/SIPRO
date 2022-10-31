<div>
    @section('title','Detail Menu')
    @section('section-header','Detail Menu')
    <div class="card">
      <div class="card-header">
        <h4>Detail Menu</h4>
      </div>
      <form wire:submit.prevent="update">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="name">Nama Menu</label>
                    <input wire:model.lazy="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Menu" required>              
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="route_name">Nama Route</label>
                    <input wire:model.defer="route_name" type="text" class="form-control @error('route_name') is-invalid @enderror" placeholder="Masukkan Nama Route" >             
                    @error('route_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input wire:model.lazy="icon" type="text" class="form-control @error('icon') is-invalid @enderror" placeholder="Masukkan Icon" >             
                    @error('icon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="parentId">ID Parent</label>
                    <select class="form-control" >
                        @foreach($parentMenus as $parentMenu)
                            @if($parentMenu->id==$menuId)
                            <option value="{{$parentMenu->id}}" selected>{{$parentMenu->name}}</option>
                            @else
                            <option value="{{$parentMenu->id}}">{{$parentMenu->name}}</option>
                            @endif
                        @endforeach
                    </select>              
                    @error('parentId')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="isActive">Status Aktivasi</label>
                    <select class="form-control" required wire:model.lazy="isActive">
                        <option value="1" @if($isActive===1)selected @endif>Aktif</option>
                        <option value="0" @if($isActive===0)selected @endif>Nonaktif</option>
                    </select>             
                     @error('isActive')
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