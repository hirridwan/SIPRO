<div>
  @section('title','Daftar Kantor')
  @section('section-header','Daftar Kantor')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Kantor</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a href="{{route('setup.office.register')}}"
                    type="button"
                    class="btn btn-success mb-4">
                    <i class="fas fa-plus-square"></i> <span>Tambah Kantor</span>
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
                    <th>Kode Kantor</th>
                    <th>Nama Kantor</th>
                    <th>Alias Kantor</th>
                    <th>Alamat Kantor</th>
                    <th>No Urut Kantor</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($offices->count()>0)

                    @foreach($offices as $key=>$office)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$office->code}}</td>
                      <td>{{$office->name}}</td>
                      <td>{{$office->shortname}}</td>
                      <td>{{$office->address}}</td>
                      <td>{{$office->order}}</td>
                      <td>
                        <a href="/setup/office/detail/{{$office->id}}" class="btn btn-primary btn-icon icon-left">Detail</a>
                        <button type="button" wire:click="deleteConfirm('{{$office->id}}','{{$office->name}}')" class="btn btn-danger btn-icon icon-left"><i class="fas fa-trash"></i></button>
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
              {{$offices->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>