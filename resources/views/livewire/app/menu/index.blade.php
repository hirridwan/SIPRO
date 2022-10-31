<div>
  @section('title','Daftar Menu')
  @section('section-header','Daftar Menu')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Menu</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a
                    href="{{route('setup.menu.register')}}"
                    type="button"
                    class="btn btn-success mb-4"
                    >
                    <i class="fas fa-plus-square"></i> <span>Tambah Menu</span>
                </a>
            </div>

            {{-- filter dan pencarian start --}}
            <div class="row mb-3">
              <div class="col-md-2 d-flex align-items-center float-right">
                Tampilkan
                <select class="form-control mx-1" wire:model='paginate'>
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                </select>
                data
              </div>
              <div class="col-md-7 text-right d-flex align-middle"></div>
              <div class="col-md-3 pull-right">
                <input wire:model="querySearch" type="text" class="form-control" placeholder="Cari"/>
              </div>
            </div>
            {{-- filter dan pencarian end --}}

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Nama Route</th>
                    <th>Icon</th>
                    <th>ID Parent</th>
                    <th>Status Aktivasi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if($menus->count()>0)
                      @foreach($menus as $key=>$menu)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->route_name}}</td>
                        <td>{{$menu->icon}}</td>
                        <td>{{$menu->getParentName($menu->parent_id)}}</td>
                        @if($menu->is_active==1) 
                        <td>Aktif</td>
                        @else
                        <td>Non Aktif</td>
                        @endif
                        <td>
                          <a href="/setup/menu/detail/{{$menu->id}}" class="btn btn-primary btn-icon icon-left">Detail</a>
                          <button type="button" wire:click.prevent="deleteConfirm('{{$menu->id}}','{{$menu->name}}')" class="btn btn-danger btn-icon icon-left"><i class="fas fa-trash"></i> <span> Hapus</span></button>
                        </td>
                      </tr>
                      @endforeach
                    @else 
                    <tr>
                      <td colspan="1000" class="text-center"><b>Data tidak ditemukan!</b></td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
              {{$menus->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>