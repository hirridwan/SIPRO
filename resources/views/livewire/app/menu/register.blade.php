<div>
    @section('title','Register Menu')
    @section('section-header','Register Menu')
    <div class="card">
        <div class="card-header">
            <h4>Registrasi Menu</h4>
        </div>
        <form wire:submit.prevent="store">
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
                            <label for="routeName">Nama Route</label>
                            <input wire:model.lazy="routeName" type="text" class="form-control @error('routeName') is-invalid @enderror" placeholder="Masukkan Nama Route">             
                            @error('routeName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="icon">Icon</label>
                            <input wire:model.lazy="icon" type="text" class="form-control @error('icon') is-invalid @enderror" placeholder="Masukkan Icon">             
                            @error('icon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="parentId">Parent Menu</label>
                            <select class="form-control" wire:model="parentId" required>
                                <option value="0" selected>Pilih Parent Menu</option>
                                @foreach($parentMenus as $parentMenu)
                                <option value="{{$parentMenu->id}}">{{$parentMenu->name}}</option>
                                @endforeach
                            </select>              
                            @error('parentId')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="isActive">Status Aktivasi.</label>
                            <select class="form-control" wire:model="isActive" required>
                                <option value="1" selected>Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>             
                            @error('isActive')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-danger">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>