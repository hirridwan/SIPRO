<div>
    @section('title','Data Analisa')
    @section('section-header','Data Analisa')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Analisa</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="buttons">
                                <a href="/data/financial-analysis/register/{{$adendumRequestData['id']}}" type="button" class="btn btn-success mb-4">
                                    <i class="fas fa-plus-square"></i> <span>Tambah Data</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <fieldset class="border p-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="#" class="col-sm-3 col-form-label">Nomor Permohonan</label>
                                            <div class="col-sm-9">
                                                <input wire:model="adendumRequestData.reg_number" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext3" class="col-sm-3 col-form-label">No Rekeing</label>
                                            <div class="col-sm-9">
                                                <input wire:model="adendumRequestData.loan_id" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="inputtext3" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input wire:model="adendumRequestData.name" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <textarea wire:model="adendumRequestData.address" type="text" rows="4" class="form-control" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive mt-4">
                                <thead>
                                </thead>
                                <table class="table table-striped table-md" style="font-size: 10pt;">
                                    <tr align="center">
                                        <th>ID Analisa</th>
                                        <th>Tanggal Analisa</th>
                                        <th>Nomor Permohonan</th>
                                        <th>Nomor Rekening</th>
                                        <th>CIF</th>
                                        <th>Surveyor</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                    <tr align="center">
                                        @forelse ($financialAnalyses as $financialAnalisis)
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><a href=""><i class="fa fa-eye text-primary" aria-hidden="true"></i></a></td>
                                            <td><a href=""><i class="fas fa-trash text-danger"></i></a></td>                                           
                                        @empty
                                            <td colspan="1000">Data Analisa Tidak Ditemukan! <a href=""></a> </td>
                                        @endforelse
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
