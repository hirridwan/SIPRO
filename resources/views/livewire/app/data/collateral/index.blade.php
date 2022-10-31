<div>
  @section('title','Daftar Agunan')
  @section('section-header','Daftar Agunan')
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Agunan</h4>
          </div>
          <div class="card-body">
          
            <div class="buttons">
                <a
                    href="{{route('data.agunan.register')}}"
                    type="button"
                    class="btn btn-success mb-4"
                    >
                    <i class="fas fa-plus-square"></i> <span>Tambah Agunan</span>
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

            <div class="table-responsive-sm" style="font-size: 10pt;">
              <table class="table table-striped table-md">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Agunan</th>
                    <th>Jenis Agunan</th>
                    <th>Keterangan Agunan</th>
                    <th>Nama Pemilik</th>
                    <th>Nilai Jaminan</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($collaterals->count()>0)
                    @foreach($collaterals as $key=>$collateral)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$collateral->agunan_id}}</td>
                    <td>{{$collateral->collateral_type_code}}</td>
                    <td>{{$collateral->keterangan_agunan}}</td>
                    <td>{{$collateral->nama_pemilik}}</td>
                    <td>{{$collateral->nilai_jaminan}}</td>
                    <td>
                      <a href="data/customer/{{$collateral->id}}"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                      <a role="button" wire:click="deleteConfirm('{{$collateral->id}}','{{$collateral->agunan_id}}')"><i class="fas fa-trash"></i></a>
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
              {{$collaterals->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>