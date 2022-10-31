
<div>
  @section('title','Daftar Jabatan')
  @section('section-header','Daftar Jabatan')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Jabatan</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a
                    href="{{route('setup.jabatan.register')}}"
                    type="button"
                    class="btn btn-success mb-4"
                    >
                    <i class="fas fa-plus-square"></i> <span>Tambah jabatan</span>
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
                    <th>Nama</th>
                    <th>Singkatan</th>
                    <th>Level</th>
                    <th>Bagian</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($jabatans->count()>0)
                    @foreach($jabatans as $key=>$jabatan)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$jabatan->nama}}</td>
                    <td>{{$jabatan->singkatan}}</td>
                    <td>{{$jabatan->level}}</td>
                    <td>{{$jabatan->bagian_id}}</td>
                    <td>
                      <a href="jabatan/detail/{{$jabatan->id}}"><i class="fa fa-eye"></i></a>&nbsp;
                      <a role="button" wire:click="deleteConfirm('{{$jabatan->id}}','{{$jabatan->nama}}')" style="border: none;"><i class="fas fa-trash text-danger"></i></a>
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
              {{$jabatans->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>