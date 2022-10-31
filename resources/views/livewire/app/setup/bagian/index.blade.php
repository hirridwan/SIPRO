
<div>
  @section('title','Daftar bagian')
  @section('section-header','Daftar Bagian')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar bagian</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a
                    href="{{route('setup.bagian.register')}}"
                    type="button"
                    class="btn btn-success mb-4"
                    >
                    <i class="fas fa-plus-square"></i> <span>Tambah bagian</span>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($bagians->count()>0)
                    @foreach($bagians as $key=>$bagian)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$bagian->nama}}</td>
                    <td>
                      <a href="bagian/detail/{{$bagian->id}}"><i class="fa fa-eye"></i></a>&nbsp;
                      <a role="button" wire:click="deleteConfirm('{{$bagian->id}}','{{$bagian->nama}}')" style="border: none;"><i class="fas fa-trash text-danger"></i></a>
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
              {{$bagians->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>