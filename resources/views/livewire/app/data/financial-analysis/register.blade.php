<div>
@section('title','Analisa Keuangan')
@section('section-header','Analisa Keuangan')
<div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>ANALISA KEUANGAN</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="#">
                                    <div class="form-row">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="loan_id" class="form-label">No Rekening</label>
                                                <input wire:model='adendumRequestData.loan_id' type="text" class="form-control" id="loan_id" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input wire:model='adendumRequestData.name' type="text" class="form-control" id="name" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Alamat</label>
                                                <input wire:model='adendumRequestData.address' type="text" class="form-control" id="address" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <fieldset class="border p-4 mt-4">
                                <legend  class="w-auto" style="font-size: 1.3em;"><strong>Input Analisa Keuangan</strong></legend>
                                <div class="row mx-0 px-0">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="#" class="form-label">Jenis Analisa</label>
                                            <select wire:model="analysis_type_code" type="text" class="form-control">
                                                <option value="" selected> -- Pilih Jenis Analisa -- </option>
                                                @foreach($analysisTypes as $analysisType)
                                                    <option value="{{$analysisType->code}}">{{$analysisType->code." - ".$analysisType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="#" class="form-label">Sub Jenis Analisa</label>
                                            <select wire:model.lazy="financialAnalysisDetailData.financial_analysis_code" type="text" class="form-control">
                                                <option selected> -- Pilih Sub Jenis Analisa -- </option>
                                                @foreach($analysisSubTypes as $analysisSubType)
                                                    <option value="{{$analysisSubType->code}}">{{$analysisSubType->code." - ".$analysisSubType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="#" class="form-label">Keterangan</label>
                                        <input wire:model="financialAnalysisDetailData.description" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="#" class="form-label">Nilai</label>
                                            <input wire:model="financialAnalysisDetailData.nominal" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="buttons align-self-center float-right">
                                            <button wire:click="addDetail" class="btn btn-primary btn-lg">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6>Rincian {{$analysisTypeName}}</h6>
                                        <div class="table-responsive">
                                            <table class="table table-stripped table-sm">
                                            <thead class="thead-light">
                                                <tr align="center">
                                                    <th>#</th>
                                                    <th>Jenis</th>
                                                    <th>Keterangan</th>
                                                    <th>Nominal</th>
                                                    <th colspan="2">Action</th>
                                                </tr>                                                
                                            </thead>
                                            @if($financialAnalysisDetailData)
                                                @forelse ($financialAnalysisDetailData as $item)
                                                <tr>
                                                    <td align="center">{{$loop->index+1}}</td>
                                                    <td>{{$item->financial_analysis_code]}}</td>
                                                    <td align="center">{{$item->description]}}</td>
                                                    <td align="center">{{$item->nominal]}}</td>
                                                    <td align="center">
                                                        <a href="#"><i class="fas fa-edit text-success"></i></a>
                                                    </td>
                                                    <td align="center">
                                                        <a href="#"><i class="fas fa-trash text-danger"></i></a>
                                                    </td>
                                                </tr>                                                
                                                @empty
                                                <tr>
                                                    <td colspan="1000" align="center">Belum ada data !</td>
                                                </tr>
                                                @endforelse
                                            @else
                                            <tr>
                                                <td colspan="1000" align="center">Belum ada data !</td>
                                            </tr>
                                            @endif
                                                <tr>
                                                    <td colspan="3" align="center"><b>Total {{$analysisTypeName}}</b></td>
                                                    <td colspan="3" align="center"><b>100.000.00</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <fieldset class="border">
                                            <legend class="w-auto" style="font-size: 1.0em;">Total Omzet</legend>
                                            <p class="pl-4">Rp. 450.000.000</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Pendapatan</h4>
                    <div class="card-header-action">
                        <a data-collapse="#pendapatan" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse-show" id="pendapatan">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <fieldset class="border p-4">
                                    <legend  class="w-auto"style="font-size: 1.3em;"><strong>Sumber Pendapatan</strong></legend>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Omzet Usaha</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Biaya Usaha</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Laba Usaha</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Gaji Pribadi</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Gaji Pasangan</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Total Gaji</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-4 col-form-label">Dari lain-lain</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset class="border p-4 mt-4">
                                    <legend  class="w-auto" style="font-size: 1.3em;"><strong>Omzet</strong></legend>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <fieldset class="border">
                                                <legend class="w-auto" style="font-size: 1.0em;">Total Omzet</legend>
                                                <p class="pl-4">Rp. 450.000.000</p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <thead>
                                                </thead>
                                                <table class="table table-bordered table-sm">
                                                    <tr align="center">
                                                        <th>#</th>
                                                        <th>Jenis</th>
                                                        <th>Keterangan</th>
                                                        <th>Nilai</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tr align="center">
                                                        <td>1</td>
                                                        <td>Dagang Uyah</td>
                                                        <td>2017-01-09</td>
                                                        <td><div class="badge badge-success">Active</div></td>
                                                        <td><a href="#"><i class="fas fa-trash text-danger"></i></a></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td>2</td>
                                                        <td>Dagang Cau</td>
                                                        <td>2017-01-09</td>
                                                        <td><div class="badge badge-success">Active</div></td>
                                                        <td><a href="#"><i class="fas fa-trash text-danger"></i></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="border p-4 mt-4">
                                    <legend  class="w-auto" style="font-size: 1.3em;"><strong>Biaya Usaha</strong></legend>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <fieldset class="border">
                                                <legend class="w-auto" style="font-size: 1.0em;">Total Biaya Usaha</legend>
                                                <p class="pl-4">Rp. 450.000.000</p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <thead>
                                                </thead>
                                                <table class="table table-bordered table-sm">
                                                    <tr align="center">
                                                        <th>#</th>
                                                        <th>Jenis</th>
                                                        <th>Keterangan</th>
                                                        <th>Nilai</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tr align="center">
                                                        <td>1</td>
                                                        <td>Dagang Uyah</td>
                                                        <td>2017-01-09</td>
                                                        <td><div class="badge badge-success">Active</div></td>
                                                        <td><a href="#"><i class="fas fa-trash text-danger"></a></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td>2</td>
                                                        <td>Dagang Cau</td>
                                                        <td>2017-01-09</td>
                                                        <td><div class="badge badge-success">Active</div></td>
                                                        <td><a href="#"><i class="fas fa-trash text-danger"></a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengeluaran</h4>
                        <div class="card-header-action">
                            <a data-collapse="#pengeluaran" href="#"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse-show" id="pengeluaran">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <fieldset class="border p-4">
                                        <legend  class="w-auto"style="font-size: 1.3em;"><strong>Pengeluaran Usaha</strong></legend>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Harga Pokok Penjualan</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Biaya Operasional</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Upah Tenaga Kerja</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Listrik, Telp, Air</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Transport Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Pengeluaran Lainnya</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Pengeluaran Lainnya</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset class="border p-4">
                                        <legend class="w-auto" style="font-size: 1.3em;"><strong>Pengeluaran Rumah Tangga</strong></legend>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Biaya Rumah Tangga</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Sewa Kontrak Rumah</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Pendidikan</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Listrik, Telp, Air.</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Transportasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="#" class="col-sm-3 col-form-label">Lain - lain</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <fieldset class="border p-4">
                                        <legend  class="w-auto"style="font-size: 1.3em;"><strong>Total Pengeluaran</strong></legend>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                <h4>Data Keuangan</h4>
                <div class="card-header-action">
                    <a data-collapse="#dataKeuangan" href="#"><i class="fas fa-minus"></i></a>
                </div>
                </div>
                                <div class="collapse-show" id="dataKeuangan">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <fieldset class="border p-4 mb-4">
                                                    <legend  class="w-auto"style="font-size: 1.3em;"><strong>Aktiva</strong></legend>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Kas</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Piutang</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Bank</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Stok Barang</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Aktiva Lancar</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <fieldset class="border pl-4">
                                                                <legend class="w-auto"style="font-size: 1.0em;"><strong>Total Aktiva</strong></legend>
                                                                <div class="total-display float-right">
                                                                    <p id="totalPasivaDisp" class="pr-4">Rp. 450.000.000</p>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-6">
                                                <fieldset class="border p-4 mb-4">
                                                    <legend  class="w-auto"style="font-size: 1.3em;"><strong>Pasiva</strong></legend>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Utang</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Utang Bank</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Utang Usaha</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#" class="col-sm-3 col-form-label">Utang Jangka Panjang</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <fieldset class="border pl-4">
                                                                <legend class="w-auto"style="font-size: 1.0em;"><strong>Total Pasiva</strong></legend>
                                                                <div class="total-display float-right">
                                                                    <p id="totalPasivaDisp" class="pr-4">Rp. 450.000.000</p>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <fieldset class="border pl-4 col-sm-12">
                                                                <legend class="w-auto"style="font-size: 1.0em;"><strong>Modal</strong></legend>
                                                                <div class="total-display">
                                                                    <p id="modalDisplay">Rp. 450.000.000</p>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <fieldset class="border pl-4 col-sm-12">
                                                                <legend class="w-auto"style="font-size: 1.0em;"><strong>Total Utang</strong></legend>
                                                                <div class="total-display">
                                                                    <p id="totalUtangDisplay">Rp. 450.000.000</p>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <fieldset class="border pl-4 mt-2">
                                                                <legend class="w-auto"style="font-size: 1.0em;"><strong>Pendapatan Bersih</strong></legend>
                                                                <div class="total-display float-right">
                                                                    <p id="pendapatanBersihDisplay" class="pr-4">Rp. 450.000.000</p>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
</div>
