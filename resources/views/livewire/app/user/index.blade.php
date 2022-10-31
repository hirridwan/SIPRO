
<div>
  @section('title','Daftar User')
  @section('section-header','Daftar User')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar User</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a
                    href="{{route('user.register')}}"
                    type="button"
                    class="btn btn-success mb-4"
                    >
                    <i class="fas fa-plus-square"></i> <span>Tambah User</span>
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
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Kantor</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($users->count()>0)
                    @foreach($users as $key=>$user)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->description}}</td>
                    <td>{{$user->office->shortname}}</td>
                    <td>
                      <img
                        alt="image"
                        src="{{asset('/img/avatar-1.png')}}"
                        class="rounded-circle"
                        width="35"
                        data-toggle="tooltip"
                        title="{{$user->name}}"
                      />
                    </td>
                    <td>
                      <a href="/user/{{$user->id}}" class="btn btn-primary btn-icon icon-left">Detail</a>
                      <button type="button" wire:click="deleteConfirm('{{$user->id}}','{{$user->name}}')" class="btn btn-xs btn-danger btn-icon icon-left"><i class="fas fa-trash"></i></button>
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
              {{$users->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>