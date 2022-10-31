<div>
  @section('title','Daftar Nasabah')
  @section('section-header','Daftar Nasabah')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Nasabah</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a
                    href="{{route('data.nasabah.register')}}"
                    type="button"
                    class="btn btn-success mb-4"
                    >
                    <i class="fas fa-plus-square"></i> <span>Tambah Data</span>
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

            <div class="table-responsive" style="font-size: 10pt;">
              <table class="table table-striped table-md">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>CIF</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($customers->count()>0)
                    @foreach($customers as $key=>$customer)
                  <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$customer->cif}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                      <a href="/data/nasabah/detail/{{$customer->id}}"><i class="fa fa-eye"></i></a>
                    </td>
                    <td>
                        <a role="button" wire:click="deleteConfirm('{{$customer->id}}','{{$customer->cif}}')" style="border: none;"><i class="fas fa-trash text-danger"></i></a>
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
              {{$customers->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>