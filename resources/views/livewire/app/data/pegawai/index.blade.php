
<div>
  @section('title','Daftar Pegawai')
  @section('section-header','Daftar Pegawai')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Pegawai</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a
                    href="{{route('data.pegawai.register')}}"
                    type="button"
                    class="btn btn-success mb-4"
                    >
                    <i class="fas fa-plus-square"></i> <span>Tambah Pegawai</span>
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
                  <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kantor</th>
                    <th>Unit Kerja</th>
                    <th>Jabatan</th>
                    <th>Bagian</th>
                    <th>ID User</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($pegawais->count()>0)
                    @foreach($pegawais as $key=>$pegawai)
                  <tr>
                    <td align="center">{{$key+1}}</td>
                    <td align="left">{{$pegawai->nama}}</td>
                    <td align="center">{{$pegawai->office->name}}</td>
                    <td align="center">{{$pegawai->unit_kerja==null?"":$pegawai->unit_kerja->nama}}</td>
                    <td align="center">{{$pegawai->jabatan->nama}}</td>
                    <td align="center">{{$pegawai->bagian==null?"":$pegawai->bagian->nama}}</td>
                    <td align="center">{{$pegawai->user->name}}</td>
                    <td align="center">
                      <a href="pegawai/detail/{{$pegawai->id}}"><i class="fa fa-eye"></i></a>
                    </td>
                    <td align="center">
                      <a role="button" wire:click="deleteConfirm('{{$pegawai->id}}','{{$pegawai->nama}}')" style="border: none;"><i class="fas fa-trash text-danger"></i></a>
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
              {{$pegawais->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>