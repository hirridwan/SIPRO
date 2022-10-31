@section('title','Data Permohonan')
@section('section-header','Data Permohonan')
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Permohonan</h4>
        </div>
        <div class="card-body">
          <div class="buttons">
            <a
                href="{{route('restruk.register')}}"
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

          <div class="table-responsive-sm" style="font-size: 10pt">
            <table class="table table-striped">
              <thead>
                <tr  align="center">
                  <th>No</th>
                  <th>No. Permohonan</th>
                  <th>No. Rekening</th>
                  <th>Nama Lengkap</th>
                  <th>Alamat</th>
                  <th>Kantor</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($adendumRequests->count()>0)
                  @foreach($adendumRequests as $adendumRequest)
                  <tr align="center">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$adendumRequest->reg_number}}</td>
                    <td>{{$adendumRequest->loan_id}}</td>
                    <td>{{$adendumRequest->customer_name}}</td>
                    <td>{{$adendumRequest->address}}</td>
                    <td>{{$adendumRequest->shortname}}</td>
                    <td>
                      <a class="badge badge-success text-decoration-none" style="font-size:8pt">{{$adendumRequest->status_name}}</a>
                    </td>
                    <td>
                      <a href="#" class="text-primary">
                        <i class="fas fa-edit"></i>
                      </a>
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
        </div>
      </div>
    </div>
  </div>
</div>