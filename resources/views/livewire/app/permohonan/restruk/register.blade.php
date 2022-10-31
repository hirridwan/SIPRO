<div>
    @section('title','Register Restruk')
    @section('section-header','Registrasi Data Permohonan')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>FORMULIR PENGAJUAN RESTRUKTURISASI</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <input wire:model="loan_id" type="text" class="form-control" placeholder="Masukan nomor rekening" aria-label="">
                                <input wire:model="loanData.loanId" type="hidden" class="d-none" placeholder="Masukan nomor rekening" aria-label="">
                            </div>
                            <div class="col-lg-2">                                
                                <button wire:click.prevent="getLoanData" class="btn btn-primary float-right" style="width: 8rem;">Periksa</button>
                            </div>
                            <div class="col-lg-6">
                                    <select wire:model.lazy="adendumRequestData.officeCode" class="form-control @error('adendumRequestData.officeId') is-invalid @enderror" disabled>
                                        <option value="" selected>-- Pilih Kantor --</option>
                                        @foreach($offices as $office)
                                        <option value="{{$office->code}}">{{$office->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("adendumRequestData.officeId")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="cif" class="form-label">Nomor CIF</label>
                                    <input wire:model.lazy="customerData.cif" type="text" class="form-control @error('customerData.cif') is-invalid @enderror" id="cif" aria-describedby="nomorRekening">              
                                    @error("customerData.cif")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="namaNasabah" class="form-label">Nama Nasabah</label>
                                    <input wire:model.lazy="customerData.name" type="text" class="form-control @error("customerData.name") is-invalid @enderror">              
                                    @error("customerData.name")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input wire:model.lazy="customerData.address" type="textarea" class="form-control @error("customerData.address") is-invalid @enderror" id="alamat">              
                                    @error("customerData.address")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="nomorktp" class="form-label">Nomor KTP</label>
                                    <input wire:model.lazy="customerData.identityId" type="text" class="form-control @error("customerData.identityId") is-invalid @enderror" id="nomorktp">              
                                    @error("customerData.identityId")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="nomorRekening" class="form-label">Nomor Rekening</label>
                                    <input wire:model.lazy="loanData.loanId" type="text" class="form-control @error('loanData.loanId') is-invalid @enderror" id="nomorRekening" aria-describedby="nomorAkad">
                                    @error("loanData.loanId")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label>Tanggal Realisasi</label>
                                    <input wire:model.lazy="loanData.startDate" type="date" class="form-control @error('loanData.startDate') is-invalid @enderror">
                                    @error("loanData.startDate")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label>Tanggal Jatuh Tempo</label>
                                    <input wire:model.lazy="loanData.dueDate" type="date" class="form-control @error('loanData.dueDate') is-invalid @enderror">
                                    @error("loanData.dueDate")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="statusPinjaman" class="form-label">Pinjaman Ke :</label>
                                    <input wire:model.lazy="loanData.loanCount" type="text" class="form-control @error('loanData.loanCount') is-invalid @enderror" id="statusPinjaman">
                                    @error("loanData.loanCount")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="plafonKredit" class="form-label">Plafon Kredit</label>
                                    <input wire:model.lazy="loanData.plafon" type="text" class="form-control @error('loanData.plafon') is-invalid @enderror" id="plafonKredit">
                                    @error("loanData.plafon")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="bakiDebet" class="form-label">Baki Debet</label>
                                    <input wire:model.lazy="loanData.outstanding" type="text" class="form-control @error('loanData.outstanding') is-invalid @enderror" id="bakiDebet">
                                    @error("loanData.outstanding")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="sukuBunga" class="form-label">Suku Bunga</label>
                                            <input wire:model.lazy="loanData.interest" type="text" class="form-control @error('loanData.interest') is-invalid @enderror" id="sukuBunga">
                                            @error("loanData.interest")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="jumlahKewajiban" class="form-label">Jangka Waktu</label>
                                            <input wire:model.lazy="loanData.period" type="text" class="form-control @error('loanData.period') is-invalid @enderror" id="jumlahKewajiban">
                                            @error("loanData.period")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="provisi" class="form-label">Provisi</label>
                                            <input wire:model.lazy="loanData.provision" type="text" class="form-control @error('loanData.provision') is-invalid @enderror" id="provisi" aria-describedby="provisi">
                                            @error("loanData.provision")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <label for="tunggakanPokok" class="form-label">Tunggakan Pokok</label>
                                            <input wire:model.lazy="loanData.loanArrear" type="text" class="form-control @error('loanData.loanArrear') is-invalid @enderror" id="tunggakanPokok">
                                            @error("loanData.loanArrear")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="tunggakanPokok" class="form-label">Hari</label>
                                            <input wire:model.lazy="loanData.loanArrearDay" type="text" class="form-control @error('loanData.loanArrearDay') is-invalid @enderror" id="tunggakanPokok">
                                            @error("loanData.loanArrearDay")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <label for="tunggakanBunga" class="form-label">Tunggakan Bunga</label>
                                            <input wire:model.lazy="loanData.interestArrear" type="text" class="form-control @error('loanData.interestArrear') is-invalid @enderror" id="tunggakanBunga">
                                            @error("loanData.interestArrear")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="tunggakanBunga" class="form-label">Hari</label>
                                            <input wire:model.lazy="loanData.interestArrearDay" type="text" class="form-control @error('loanData.interestArrearDay') is-invalid @enderror" id="tunggakanBunga">
                                            @error("loanData.interestArrearDay")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tunggakanDenda" class="form-label">Tunggakan Denda</label>
                                            <input wire:model.lazy="loanData.penalty" type="text" class="form-control @error('loanData.penalty') is-invalid @enderror" id="tunggakanDenda">
                                            @error("loanData.penalty")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sistem Angsuran</label>
                                    <select wire:model.lazy="loanData.installmentSystemCode" class="form-control @error('loanData.installmentSystemId') is-invalid @enderror">
                                        <option selected>Pilih Sistem Angsuran</option>
                                        @foreach($installmentSystems as $installmentSystem)
                                        <option value="{{$installmentSystem->code}}">{{$installmentSystem->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("loanData.installmentSystemId")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sistem Bunga</label>
                                    <select wire:model.lazy="loanData.interestSystemCode" class="form-control @error('loanData.interestSystemId') is-invalid @enderror">
                                        <option selected>--Pilih Sistem Bunga--</option>
                                        @foreach($interestSystems as $interestSystem)
                                        <option value="{{$interestSystem->code}}">{{$interestSystem->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("loanData.interestSystemCode")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Kualitas Kredit</label>
                                    <select wire:model.lazy="loanData.qualityId" class="form-control @error('loanData.qualityId') is-invalid @enderror">
                                        <option>--Pilih Kualitas Kredit--</option>
                                        @foreach($loanQualities as $loanQuality)
                                        <option value="{{$loanQuality->id}}">{{$loanQuality->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("loanData.qualityId")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jenis Penggunaan Kredit</label>
                                    <select wire:model.lazy="loanData.usageTypeCode" class="form-control @error('loanData.usageTypeId') is-invalid @enderror">
                                        <option selected>--Pilih Jenis Penggunaan--</option>
                                        @foreach($usageTypes as $usageType)
                                        <option value="{{$usageType->code}}">{{$usageType->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("loanData.usageTypeCode")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Skim / Produk Kredit</label>
                                    <select wire:model.lazy="loanData.loanProductCode" class="form-control @error('loanData.loanProductId') is-invalid @enderror">
                                        <option selected>--Pilih Skim Kredit--</option>
                                        @foreach($loanProducts as $loanProduct)
                                        <option value="{{$loanProduct->code}}">{{$loanProduct->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("loanData.loanProductCode")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label>Rencana Pembayaran</label>
                                    <input wire:model.lazy="adendumRequestData.paymentPlan" type="text" class="form-control @error('adendumRequestData.paymentPlan') is-invalid @enderror">
                                    @error("adendumRequestData.paymentPlan")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="buttons">
                            <button type="submit" class="btn btn-primary text-center float-right" style="width: 8rem;">
                            Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
