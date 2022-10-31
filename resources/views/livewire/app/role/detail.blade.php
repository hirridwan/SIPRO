<div>
  @section('title','Detail Role')
  @section('section-header','Detail Role')
  <div class="card">
    <div class="card-header">
      <h4>Detail Role</h4>
    </div>
    <form wire:submit.prevent="update">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group ">
              <label for="description">Deskripsi Role</label>
              <input wire:model.defer="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi Role" required>              
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
              <input wire:model.defer="authorityLevel" type="number" class="form-control @error('authorityLevel') is-invalid @enderror" placeholder="Masukkan Level Autoritas" required>             
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
    <div class="card">
      <div class="card-header">
        <h5>Menu</h5>
      </div>
      <form>
        @foreach($menus as $key=>$menu)
        <ul>
          @if($menu->parent_id==0)
            <li><input type="checkbox" wire:model="selectedParentMenus" value="{{$menu->id}}"><label>{{$menu->name}}</label></li>
            <ul>
              @foreach($menus as $child)
                @if($child->parent_id==$menu->id)
                    <li><input type="checkbox" wire:model='selectedMenus' value="{{$child->id}}"><label>{{$child->name}}</label></li>
                @endif
              @endforeach
            </ul>
          @endif
        </ul>
        @endforeach
        <div class="card-footer text-right">
          <button type="button" wire:click.prevent="roleMenuUpdate" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>